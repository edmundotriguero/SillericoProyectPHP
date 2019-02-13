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
                $nombreTalla = trim($request->get('nombreTalla'));

                $sucursal=DB::table('sucursales')->get();
                $categorias=DB::table('categorias')->get();
                $tallas = DB::table('tallas')->get();
                
                $desc=DB::table('descuentos')->get();

                $productos=DB::table('productos as p')
                ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
                ->join('telas as t','p.idtela','=','t.idtela')
                ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
                ->join('color as co', 'p.idcolor','=','co.idcolor')
                ->join('tallas as ta','p.idtalla','=','ta.idtalla')
                ->where('p.estado','=','1')
                ->where('p.codigo','LIKE','%'.$query.'%')
                ->where('p.idcategoria','LIKE','%'.$idcat.'%')
                ->where('p.idsucursal','LIKE','%'.$idsuc.'%')
                ->where('p.precio','LIKE','%'.$precio.'%')
                //->where('p.idtalla','LIKE',$idtal)
                ->where('ta.nombre','LIKE','%'.$nombreTalla)

                ->select('p.idproducto','p.fechaCod','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as idtela','p.precio','c.nombre as idcategoria','s.nombre as idsucursal','p.lote')
                ->orderBy('p.idproducto','asc')
                ->paginate(50);
    
                return view('almacen.producto.index',["desc"=>$desc,"productos"=>$productos,"precio"=>$precio,"tallas"=>$tallas,"searchText"=>$query,"sucursal"=>$sucursal,"categorias"=>$categorias,"idcat"=>$idcat,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla]);
            }
       
        


    }
    public function create(){
        $categorias=DB::table('categorias')->where('condicion','LIKE','1')->get();
        $sucursales=DB::table('sucursales')->where('condicion','LIKE','1')->get();
        $color=DB::table('color')->where('estado','LIKE','1')->get();
        $talla=DB::table('tallas')->where('estado','LIKE','1')->get();
        $telas=DB::table('telas')->where('condicion','LIKE','1')->get();
        

        return view("almacen.producto.create",["categorias"=>$categorias,"sucursales"=>$sucursales,"telas"=>$telas,"talla"=>$talla,"color"=>$color]);

    }
    public function store(ProductoFormRequest $request) {
       // try {
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
       // } catch (\Exception $e) {
            DB::rollback();
      //  }
        return Redirect::to('almacen/producto');
    }
    public function show($id) {
        return view("almacen.producto.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id){

        $categoria=DB::table('categorias')->get();
        $sucursal=DB::table('sucursales')->get();
        $color=DB::table('color')->get();
        $talla=DB::table('tallas')->get();
        $tela=DB::table('telas')->get();

        return view("almacen.producto.edit",["producto"=>Producto::findOrFail($id),"categoria"=>$categoria,"sucursal"=>$sucursal,"color"=>$color,"talla"=>$talla,"tela"=>$tela]);
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
    
    public function desc($id){

        $lote=DB::table('productos')
        ->select('lote')
        ->where('idproducto','LIKE',$id)
        ->first();
        

        return view("almacen.producto.desc",["lote"=>$lote]);
    }

    public function descStore(Request $request){
    try{
        $xlote = $request->get('lote');
        $desc = $request->get('desc');
        
        DB::insert('insert into descuentos ( lote, porcentaje)values(?,?)', [$xlote,$desc]);
        DB::commit();

        return Redirect::to('almacen/producto');
    }catch (\Illuminate\Database\QueryException $e){
        
        return redirect()->back()->withErrors("Verfique que no exista el registro o alguna restriccion en la Base de datos");
    }
    }

}
