<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use Illuminate\Support\Facades\Input;
use Response;

use Illuminate\Support\Collection;


use sillericos\Http\Requests\ProductoFormRequest;
use sillericos\Http\Requests\VentasFormRequest;
use sillericos\Http\Requests\SaldosFormRequest;
use sillericos\Producto;
use sillericos\Ventas;
use sillericos\Saldo;

use Illuminate\Support\Facades\Redirect;



use DB;

class VentasController extends Controller
{
    public  function __construct()
    {
        # code...
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    public function index(Request $request){
        
            if($request){


                $query = trim($request->get('searchText'));
                //$idcat = trim($request->get('idcat'));
                //$idsuc = trim($request->get('idsuc'));

                $sucursales=DB::table('sucursales')->get();
                $categorias=DB::table('categorias')->get();

            
                $ventas=DB::table('ventas as v')
                ->join('productos as p', 'p.idproducto','=', 'v.idproducto')
                ->join('categorias as c', 'p.idcategoria','=', 'c.idcategoria')

                //->join('telas as t','p.idtela','=','t.idtela')
               // ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
               // ->join('color as co', 'p.idcolor','=','co.idcolor')
               // ->join('tallas as ta','p.idtalla','=','ta.idtalla')
                ->where('v.estado','LIKE','1')
                ->where('v.numDoc','LIKE','%'.$query.'%')
                //->where('p.idcategoria','LIKE','%'.$idcat.'%')
                //->where('p.idsucursal','LIKE','%'.$idsuc.'%')
                ->select('v.id','v.fechaVenta','v.tipoDoc','v.numDoc','v.cliente','c.nombre as categoria','v.costoVenta','v.saldo','v.ingreso','p.codigo')
                ->orderBy('v.fechaVenta','asc')
                ->paginate(50);
    
                return view('ventas.ventas.index',["ventas"=>$ventas]);
            }

    }
    public function create(){

        $productos = DB::table('productos as p')
        ->join('categorias as c','p.idcategoria','=','c.idcategoria')
        ->join('color as cl','p.idcolor','=','cl.idcolor')
        ->select('p.idproducto','p.codigo','c.nombre as categoria' ,'cl.nombre as color','p.precio as precio','p.lote as lote','p.precio as desc')
        ->where('p.estado','=','1')
        ->orderBy('p.idproducto','asc')
        ->get();
        $lote=DB::table('lote')->get();
        
        
    //    retorna el array con el descuento incluido 
        foreach($productos as $producto){
           foreach ($lote as $d) {
              if($d->id == $producto->lote){
                $producto->desc = $producto->desc - ($producto->desc * $d->porcentaje_descuento / 100); 
            }
           }
        }

        return view("ventas.ventas.create",["productos"=>$productos]);
    }
    //optimisar codigo y validar desde el lado de la vista para permitir solo una instancia cuando se ingrese nuevos valores de saldo o cuando se cree un saldo 
    public function store(VentasFormRequest $request) {
       // try {
            DB::beginTransaction();

            $bandera = $request->get('bandera');
            //si bandera es igual a 3 ingresa todos los campos 
            if($bandera == 3){

            $idproducto = $request->get('idproducto');
            $cliente = $request->get('cliente');
            $fechaVenta = $request->get('fechaVenta');
            $idtipoDoc = $request->get('idtipoDoc');
            $numDoc = $request->get('numDoc');
            $precio = $request->get('precio');
           
            $cont = 0;

            while ($cont < count($idproducto)) {
                $ventas = new Ventas();
                $ventas->idproducto = $idproducto[$cont];
                $ventas->cliente = $cliente[$cont];
                $ventas->fechaVenta = $fechaVenta[$cont];
                $ventas->tipoDoc = $idtipoDoc[$cont];
                $ventas->numDoc = $numDoc[$cont];
                $ventas->costoVenta = $precio[$cont];
                $ventas->ingreso = $precio[$cont];
               
                $ventas->estado = '1';
                 $ventas->save();

                DB::update('update productos set estado = 2 where idproducto = ?', [$idproducto[$cont]]);          
                $cont = $cont + 1;
            }
            // si bandera es igual a 1, guarda ambien en ventas solo permitir una instancia de venta
            }else  if ($bandera == 1){
                $idproducto = $request->get('idproducto');
            $cliente = $request->get('cliente');
            $fechaVenta = $request->get('fechaVenta');
            $idtipoDoc = $request->get('idtipoDoc');
            $numDoc = $request->get('numDoc');
            $precio = $request->get('precio');

            $venta = $request->get('venta');
            $saldo  = $request->get('saldo');
           
            $cont = 0;

            while ($cont < count($idproducto)) {
                $ventas = new Ventas();
                $ventas->idproducto = $idproducto[$cont];
                $ventas->cliente = $cliente[$cont];
                $ventas->fechaVenta = $fechaVenta[$cont];
                $ventas->tipoDoc = $idtipoDoc[$cont];
                $ventas->numDoc = $numDoc[$cont];
                $ventas->costoVenta = $venta[$cont];
                $ventas->ingreso = $precio[$cont];
                $ventas->saldo = $saldo[$cont];
               
                $ventas->estado = '1';
                $ventas->save();

                DB::update('update productos set estado = 2 where idproducto = ?', [$idproducto[$cont]]);

                DB::update('insert into ventasaldo (idventa, ingreso, fecha, tipoDoc, numDoc, estado)values(?,?,?,?,?,?)', [$ventas->id, $precio[$cont], $fechaVenta[$cont], $idtipoDoc[$cont],$numDoc[$cont],'1']);


                $cont = $cont + 1;
            }

            }
         
            DB::commit();
     //   } catch (\Exception $e) {
     //       DB::rollback();
      //  }
        return Redirect::to('ventas/ventas');
    }

    public function show($id) {
        $venta=DB::table('ventas')
        ->where('id','=',$id)
        ->first();
        

        $productos=DB::table('productos as p')
        ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
        ->join('telas as t','p.idtela','=','t.idtela')
        ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
        ->join('color as co', 'p.idcolor','=','co.idcolor')
        ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        ->join('lote as l','p.lote','=','l.id')
        ->join('ventas as v','p.idproducto','=','v.idproducto')
        // ->where('p.idproducto','=',$venta->idproducto)
        ->where('v.id','=',$id)

        ->select('p.idproducto','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as tela','p.precio','c.nombre as categoria','s.nombre as sucursal')
        ->get();

        $saldos=DB::table('ventasaldo as s')
        ->join('ventas as v', 's.idventa','=', 'v.id')
        ->where('v.id','=',$id)
        ->select('s.id', 's.idventa', 's.ingreso', 's.fecha', 's.tipoDoc', 's.numDoc', 's.estado')
        ->orderBy('s.fecha','asc')
        ->get();


        
        return view("ventas.ventas.show",["productos"=>$productos,"venta"=>$venta, "saldos"=>$saldos]);
    }

    public function showBill($id) {
        $venta=DB::table('ventas')
        ->where('id','=',$id)
        ->first();
        

        $productos=DB::table('productos as p')
        ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
        ->join('telas as t','p.idtela','=','t.idtela')
        ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
        ->join('color as co', 'p.idcolor','=','co.idcolor')
        ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        ->join('lote as l','p.lote','=','l.id')
        ->join('ventas as v','p.idproducto','=','v.idproducto')
        // ->where('p.idproducto','=',$venta->idproducto)
        ->where('v.numDoc','=',$venta->numDoc)

        ->select('p.idproducto','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as tela','c.nombre as categoria','s.nombre as sucursal','v.costoVenta as venta','v.saldo','v.ingreso','v.id as idventa')
        ->get();

       


        
        return view("ventas.ventas.showBill",["productos"=>$productos,"venta"=>$venta]);
    }

    public function edit($id){

        $venta=DB::table('ventas')
        ->where('id','=',$id)
        ->first();
        

        $producto=DB::table('productos as p')
        ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
        ->join('telas as t','p.idtela','=','t.idtela')
        ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
        ->join('color as co', 'p.idcolor','=','co.idcolor')
        ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        ->join('lote as l','p.lote','=','l.id')
        ->where('p.idproducto','=',$venta->idproducto)

        ->select('p.idproducto','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as tela','p.precio','c.nombre as categoria','s.nombre as sucursal')
        ->first();



        
        return view("ventas.ventas.edit",["producto"=>$producto,"venta"=>$venta]);
    }

    public function update(VentasFormRequest $request, $id){

        $venta = Ventas::findOrFail($id);
        $venta->fechaVenta=$request->get('fechaVenta');
        $venta->tipoDoc = $request->get('tipoDoc');
        $venta->numDoc = $request->get('numDoc');
        $venta->cliente = $request->get('cliente');
        $venta->costoVenta = $request->get('costoVenta');
        
        
        $venta->update();
                    
       
        return Redirect::to('ventas/ventas');
    }

    public function destroy($id){
       // $var = base64_decode($id);
       $product_id = 0;

        $ventas = Ventas::findOrFail($id);
        $ventas->estado='0';

        $product_id = $ventas->idproducto;

        $ventas->update();

        $producto = Producto::findOrFail($product_id);
        $producto->estado='1';
        
        $producto->update();

        //  colocar el estado de los productos nuevamente en 1 

        return Redirect::to('ventas/ventas');

    }

    
    //parte desde empieza la parte de saldos 
 
    public function indexSaldos(Request $request){
        if($request){
            $query = trim($request->get('searchText'));
            

          

            $saldo=DB::table('ventasaldo as s')
          //  ->join('productos as p', 'p.idproducto','=', 'v.idproducto')
           

            ->where('s.estado','!=','0')
            
            ->where('s.numDoc','LIKE','%'.$query.'%')
            //->where('p.idcategoria','LIKE','%'.$idcat.'%')
            //->where('p.idsucursal','LIKE','%'.$idsuc.'%')
            ->select('s.id','s.idventa','s.ingreso','s.fecha','s.tipoDoc','numDoc','s.estado')
            ->orderBy('s.id','asc')
            ->paginate(50);
        
        return view("ventas.indexSaldos",["saldo"=>$saldo]);
        }
    }

    public  function crearSaldo($idventa){
        $venta=DB::table('ventas as v')
        ->join('productos as p', 'p.idproducto','=', 'v.idproducto')
        ->join('categorias as c', 'p.idcategoria','=', 'c.idcategoria')
//POR SI SE DESEA ALGUN DATO EXTRA
        //->join('telas as t','p.idtela','=','t.idtela')
       // ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
       // ->join('color as co', 'p.idcolor','=','co.idcolor')
       // ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        
        ->where('v.id','LIKE',$idventa)
      
        ->select('v.id','v.fechaVenta','v.tipoDoc','v.numDoc','v.cliente','c.nombre as categoria','v.costoVenta','v.saldo','v.ingreso')
        ->orderBy('v.fechaVenta','asc')
        ->first();

        $saldos=DB::table('ventasaldo as s')
        ->join('ventas as v', 's.idventa','=', 'v.id')
        ->where('v.id','=',$idventa)
        ->select('s.id', 's.idventa', 's.ingreso', 's.fecha', 's.tipoDoc', 's.numDoc', 's.estado')
        ->orderBy('s.fecha','asc')
        ->get();

        return view("ventas.createSaldo",["venta"=>$venta,"saldos"=>$saldos,"idventa"=>$idventa]);
    }
   
    
    public function storeSaldos(SaldosFormRequest $request) {
         try {
             DB::beginTransaction();
 
             

             $idventa = $request->get('idventa');
             $precio = $request->get('precio');
             $fecha = $request->get('fecha');
             $idtipoDoc = $request->get('idtipoDoc');
             $numDoc = $request->get('numDoc');
             
            //variables que para actualizar los saldos de ventas
            $pagado = $request->get('pagado');
            $porPagar = $request->get('porPagar');
            $precioVenta = $request->get('precioVenta');

             $cont = 0;
            $aux = 0;
            $aux2 = 0;
             while ($cont < count($precio)) {
                 $saldo = new Saldo();
                 $saldo->idventa = $idventa;
                 $saldo->fecha = $fecha[$cont];
                 $saldo->tipoDoc = $idtipoDoc[$cont];
                 $saldo->numDoc = $numDoc[$cont];
                 $saldo->ingreso = $precio[$cont];
                
                 $saldo->estado = '1';
                 $saldo->save();
                
                 $aux = $precio[$cont] + $pagado;
                 $aux2 = $porPagar - $precio[$cont];
                 //DB::update('update productos set estado = 2 where idproducto = ?', [$idproducto[$cont]]);
                 DB::update('update ventas set ingreso = ?,saldo = ? where id = ?', [$aux, $aux2, $idventa]);
                 if($aux >= $precioVenta){
                    DB::update('update ventasaldo set estado = 2 where idventa = ?', [ $idventa]);
                 }
 
                 $cont = $cont + 1;
             }
             DB::commit();
             return Redirect::to('ventas/indexSaldo');
            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                  return redirect()->back()->withErrors('Verfique que no exista el registro o alguna restriccion en la Base de datos: comuniquese con el Administrador  '.$e); 
             }
     }

}

