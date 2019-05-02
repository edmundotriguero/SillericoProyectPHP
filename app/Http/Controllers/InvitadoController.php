<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Support\Collection;
use sillericos\Producto;

use DB;

class InvitadoController extends Controller
{

    public  function __construct()
    {
        # code...
        $this->middleware('auth');
        //$this->middleware('isAdmin');
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

                $sucursal=DB::table('sucursales')->get();
                $categorias=DB::table('categorias')->get();
                $tallas = DB::table('tallas')->get();
                $telas = DB::table('telas')->get();
                $color = DB::table('color')->get();
                
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


                return view('invitado.indexProd',["color"=>$color,"idcol"=>$idcol,"idtel"=>$idtel,"telas"=>$telas,"productos"=>$productos,"precio"=>$precio,"tallas"=>$tallas,"searchText"=>$query,"sucursal"=>$sucursal,"categorias"=>$categorias,"idcat"=>$idcat,"idsuc"=>$idsuc,"idtal"=>$idtal,"precio"=>$precio,"nombreTalla"=>$nombreTalla]);

    
            }
       
        


    
    
}

}
