<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Support\Collection;
use sillericos\Http\Requests;

use sillericos\Http\Requests\ProductoFormRequest;
use sillericos\Producto;

use DB;

class ProductoController extends Controller
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
                $idcat = trim($request->get('idcat'));
                $idsuc = trim($request->get('idsuc'));
                $precio = trim($request->get('precio'));
                $idtal = trim($request->get('idtal'));
                $idtel = trim($request->get('idtel'));
                $idcol = trim($request->get('idcol'));

                $nombreTalla = trim($request->get('nombreTalla'));
                $nombreTela = trim($request->get('nombreTela'));
                $nombreColor = trim($request->get('nombreColor'));

                $sucursal=DB::table('sucursales')->orderBy('nombre','asc')->get();
                $categorias=DB::table('categorias')->orderBy('nombre','asc')->get();
                $tallas = DB::table('tallas')->orderBy('nombre','asc')->get();
                $telas = DB::table('telas')->orderBy('nombre','asc')->get();
                $color = DB::table('color')->orderBy('nombre','asc')->get();
                
                // $desc=DB::table('descuentos')->get();

                $productos=DB::table('productos as p')
                ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
                ->join('telas as t','p.idtela','=','t.idtela')
                ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
                ->join('color as co', 'p.idcolor','=','co.idcolor')
                ->join('tallas as ta','p.idtalla','=','ta.idtalla')
                ->join('lote as l','p.lote','=','l.id')
                ->where('p.estado','=','1')
                ->where('p.codigo','LIKE','%'.$query.'%')
                ->where('p.idcategoria','LIKE','%'.$idcat.'%')
                ->where('p.idsucursal','LIKE','%'.$idsuc.'%')
                ->where('p.precio','LIKE','%'.$precio.'%')
                //->where('p.idtalla','LIKE',$idtal)
                ->where('ta.nombre','LIKE','%'.$nombreTalla)
                ->where('t.nombre','LIKE','%'.$nombreTela.'%')
                ->where('co.nombre','LIKE','%'.$nombreColor.'%')

                ->select('p.idproducto','p.fechaCod','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as idtela','p.precio','c.nombre as idcategoria','s.nombre as idsucursal','l.lote as lote','l.porcentaje_descuento as desc')
                ->orderBy('p.idproducto','asc')
                ->paginate(50);

                //dd(count($productos));
            
    
                return view('almacen.producto.index',["color"=>$color,"idcol"=>$idcol,"idtel"=>$idtel,"telas"=>$telas,"productos"=>$productos,"precio"=>$precio,"tallas"=>$tallas,"searchText"=>$query,"sucursal"=>$sucursal,"categorias"=>$categorias,"idcat"=>$idcat,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla]);
            }
       
        


    }
    public function create(){
        $categorias=DB::table('categorias')->where('condicion','LIKE','1')->orderBy('nombre','asc')->get();
        $sucursales=DB::table('sucursales')->where('condicion','LIKE','1')->orderBy('nombre','asc')->get();
        $color=DB::table('color')->where('estado','LIKE','1')->orderBy('nombre','asc')->get();
        $talla=DB::table('tallas')->where('estado','LIKE','1')->orderBy('nombre','asc')->get();
        $telas=DB::table('telas')->where('condicion','LIKE','1')->orderBy('nombre','asc')->get();
        $lotes=DB::table('lote')->where('estado','LIKE','1')->orderBy('id','desc')->get();
        

        return view("almacen.producto.create",["categorias"=>$categorias,"sucursales"=>$sucursales,"telas"=>$telas,"talla"=>$talla,"color"=>$color,"lotes"=>$lotes]);

    }
    public function store(ProductoFormRequest $request) {
        try {
            DB::beginTransaction();
            

            $idcategoria = $request->get('idcategoria');
            $idsucursal = $request->get('idsucursal');
            $fechaCod = $request->get('fechaCod');
            $codigo = $request->get('codigo');
            $idtalla = $request->get('idtalla');
            $idtela = $request->get('idtela');
            $precio = $request->get('precio');
            $idcolor = $request->get('idcolor');
            $lote = $request->get('slote');
            $cont = 0;

            while ($cont < count($codigo)) {
                $producto = new Producto();
                $producto->idcategoria = $idcategoria[$cont];
                $producto->idsucursal = $idsucursal[$cont];
                $producto->fechaCod = $fechaCod[$cont];
                $producto->codigo = $codigo[$cont];
                $producto->idtalla = $idtalla[$cont];
                $producto->idtela = $idtela[$cont];
                $producto->precio = $precio[$cont];
                $producto->idcolor = $idcolor[$cont];
                $producto->estado = '1';
                $producto->lote = $lote;
                $producto->save();
                $cont = $cont + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors('error al insertar datos'.$e);

        }
        return Redirect::to('almacen/producto');
    }
    public function show($id) {
        
       

        $producto=DB::table('productos as p')
        ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
        ->join('telas as t','p.idtela','=','t.idtela')
        ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
        ->join('color as co', 'p.idcolor','=','co.idcolor')
        ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        ->join('lote as l','p.lote','=','l.id')
        ->where('p.estado','=','1')
        ->where('p.idproducto','=',$id)

        ->select('p.idproducto','p.fechaCod','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as tela','p.precio','c.nombre as categoria','s.nombre as sucursal','l.lote as lote','l.porcentaje_descuento as desc','p.lote as lote_id')
        ->first();
       //dd($desc);
       
       return view("almacen.producto.show",['producto'=>$producto]);

    }

    public function edit($id){

        $categoria=DB::table('categorias')->where('condicion','=','1')->orderBy('nombre','asc')->get();
        $sucursal=DB::table('sucursales')->where('condicion','=','1')->orderBy('nombre','asc')->get();
        $color=DB::table('color')->where('estado','=','1')->orderBy('nombre','asc')->get();
        $talla=DB::table('tallas')->where('estado','=','1')->orderBy('nombre','asc')->get();
        $tela=DB::table('telas')->where('condicion','=','1')->orderBy('nombre','asc')->get();
        
        
        $lotes=DB::table('lote')->where('estado','=','1')->get();

        return view("almacen.producto.edit",["producto"=>Producto::findOrFail($id),"categoria"=>$categoria,"sucursal"=>$sucursal,"color"=>$color,"talla"=>$talla,"tela"=>$tela,"lotes"=>$lotes]);
    }

    public function update(ProductoFormRequest $request, $id){

        $producto = Producto::findOrFail($id);
        $producto->idcategoria=$request->get('idcategoria');
        $producto->idsucursal = $request->get('idsucursal');
        $producto->fechaCod = $request->get('fechaCod');
        $producto->codigo = $request->get('codigo');
        $producto->idtalla = $request->get('idtalla');
        $producto->idtela = $request->get('idtela');
        $producto->precio = $request->get('precio');
        $producto->idcolor = $request->get('idcolor');
        $producto->lote=$request->get('idlote');
        
        $producto->update();
                    
       
        return Redirect::to('almacen/producto');
    }

    public function destroy($id){
       // $var = base64_decode($id);
        $producto = Producto::findOrFail($id);
        $producto->estado='0';
        $producto->update();

        return Redirect::to('almacen/producto');

    }
    
    // // public function desc($id){

    // //     $lote=DB::table('productos')
    // //     ->select('lote')
    // //     ->where('idproducto','LIKE',$id)
    // //     ->first();
        
        
    // //     $porcentaje=DB::table('descuentos')->select('porcentaje')->where('lote','LIKE',$lote->lote)->first();

        

    // //     return view("almacen.producto.desc",["lote"=>$lote,"porcentaje"=>$porcentaje]);
    // // }

    // public function descStore(Request $request){
    // try{

    //     $xlote = $request->get('lote');
    //     $desc = $request->get('desc');

    //     $existencia = DB::table('descuentos')
    //     ->select('lote')
    //     ->where('lote', '=', $xlote)
    //     ->get();

    //     if ($desc == 0) {
    //        //DELETE FROM `descuentos` WHERE `descuentos`.`id` = 4
    //         DB::delete('delete from descuentos where lote = ?', [$xlote]);
    //         DB::commit();

    //     }elseif (count($existencia) != 0) {
    //         # code...
    //         DB::update('update descuentos set porcentaje = ? where lote = ?', [$desc, $xlote]);
    //         DB::commit();

    //     }else {
    //         DB::insert('insert into descuentos ( lote, porcentaje)values(?,?)', [$xlote,$desc]);
    //         DB::commit();
            
    //     }

    //     return Redirect::to('almacen/producto');
    // }catch (\Illuminate\Database\QueryException $e){
        
    //     return redirect()->back()->withErrors("Verfique que no exista el registro o alguna restriccion en la Base de datos contacte con el administrador y reporte el problema");
    // }
    // }

    
    

}
