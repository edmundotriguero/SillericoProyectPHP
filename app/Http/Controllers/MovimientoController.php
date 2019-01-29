<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use DB;

use sillericos\Movimiento;

use sillericos\Producto;

use Illuminate\Support\Facades\Redirect;

use sillericos\Http\Requests\MovimientoFormRequest;
use sillericos\Http\Requests\ProductoFormRequest;

class MovimientoController extends Controller
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
              
                $sucursales=DB::table('sucursales')->get();           

                $movimientos=DB::table('movimientos as m')
                ->join('productos as p', 'm.idproducto', '=', 'p.idproducto')
                ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
               
                ->where('p.estado','!=','0')
                ->where('p.codigo','LIKE','%'.$query.'%')
               // ->where('p.idcategoria','LIKE','%'.$idcat.'%')
               // ->where('p.idsucursal','LIKE','%'.$idsuc.'%')
               // ->where('p.precio','LIKE','%'.$precio.'%')
                //->where('p.idtalla','LIKE','%'.$idtal.'%')

                ->select('m.idmovimiento','c.nombre as categoria','p.codigo','m.idSucOrigen','m.idSucDestino', 'm.fecha')
                ->orderBy('m.idmovimiento','desc')
                ->paginate(50);
    
                return view('almacen.movimiento.index',["searchText"=>$query,"sucursales"=>$sucursales,"movimientos"=>$movimientos]);
            }
       
        


    }
    public function create(){
       
        $sucursales=DB::table('sucursales as s')->where('s.condicion','LIKE','1')->get();
       $productos=DB::table('productos as p')
       ->join('categorias as c', 'p.idcategoria','=','c.idcategoria')
       ->join('sucursales as s', 'p.idsucursal','=','s.idsucursales')
       ->where('p.estado','LIKE','1')
       ->select('p.idproducto','c.nombre as categoria','p.codigo', 's.nombre as sucursal','s.idsucursales as idsuc')->get();
        return view("almacen.movimiento.create",["sucursales"=>$sucursales,"productos"=>$productos]);

    }
    public function store(MovimientoFormRequest $request) {
      //  try {
            DB::beginTransaction();
            

            $idproducto = $request->get('idproducto');
            $idsucursalOrigen = $request->get('idSucOrigen');
            $idsucursalDestino = $request->get('idSucDestino');
            $fecha = $request->get('fecha');
           
           //para habilitar fecha de combio de lugar
            //$fecha = $request->get('fecha');
           
            $cont = 0;

            while ($cont < count($idproducto)) {
                $movimiento = new Movimiento();
                $movimiento->idproducto = $idproducto[$cont];
                $movimiento->idSucOrigen = $idsucursalOrigen[$cont];
                $movimiento->idSucDestino = $idsucursalDestino[$cont];
                $movimiento->fecha = $fecha[$cont];
                $movimiento->save();

                DB::update('update productos set idsucursal = ? where idproducto = ?', [$idsucursalDestino[$cont],$idproducto[$cont]]);

                $cont = $cont + 1;               
            }
            DB::commit();
       // } catch (\Exception $e) {
           // DB::rollback();
     // }
        return Redirect::to('almacen/movimiento');
    }
    
    public function show($id) {
        return view("almacen.movimiento.show",["movimiento"=>Movimiento::findOrFail($id)]);
    }

    public function edit($id){

        $categoria=DB::table('categorias')->get();
        $sucursal=DB::table('sucursales')->get();
        $color=DB::table('color')->get();
        $talla=DB::table('tallas')->get();
        $tela=DB::table('telas')->get();

       // return view("almacen.producto.edit",["producto"=>Producto::findOrFail($id),"categoria"=>$categoria,"sucursal"=>$sucursal,"color"=>$color,"talla"=>$talla,"tela"=>$tela]);
    }

    public function update(ProductoFormRequest $request, $id){

    /**    $producto = Producto::findOrFail($id);
        $producto->idcategoria=$request->get('idcategoria');
        $producto->idsucursal = $request->get('idsucursal');
        $producto->fechaCod = $request->get('fechaCod');
        $producto->codigo = $request->get('codigo');
        $producto->idtalla = $request->get('idtalla');
        $producto->idtela = $request->get('idtela');
        $producto->precio = $request->get('precio');
        $producto->idcolor = $request->get('idcolor');
        
        $producto->update();*/
                    
       
      //  return Redirect::to('almacen/producto');
    }

    public function destroy($id){
       // $var = base64_decode($id);
        $movimiento = Movimiento::findOrFail($id);
       
        $movimiento->delete();

        return Redirect::to('almacen/movimiento');

    }
}
