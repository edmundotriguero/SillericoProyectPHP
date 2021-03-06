<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;
use sillericos\Http\Controllers\Controller;

use DB;

class ReportesController extends Controller
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

                $fechaInicio = trim($request->get('fechaInicio'));
                $fechaFinal = trim($request->get('fechaFinal'));

                $sucursales=DB::table('sucursales')->get();
                $categorias=DB::table('categorias')->get();

                $ventas=DB::table('ventas as v')
                ->join('productos as p', 'p.idproducto','=', 'v.idproducto')
                ->join('categorias as c', 'p.idcategoria','=', 'c.idcategoria')
                //->join('telas as t','p.idtela','=','t.idtela')
                ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
               // ->join('color as co', 'p.idcolor','=','co.idcolor')
               // ->join('tallas as ta','p.idtalla','=','ta.idtalla')
               ->whereBetween('v.fechaVenta',[$fechaInicio, $fechaFinal])
                ->where('v.estado','LIKE','1')
                ->where('v.numDoc','LIKE','%'.$query.'%')
                ->where('p.idcategoria','LIKE','%'.$idcat.'%')
                ->where('p.idsucursal','LIKE','%'.$idsuc.'%')
                ->select('v.id','v.fechaVenta','v.tipoDoc','v.numDoc','v.cliente','c.nombre as categoria','v.costoVenta','v.saldo','v.ingreso','s.nombre as sucursal','p.codigo')
                ->orderBy('v.fechaVenta','asc')
                ->paginate(200);
    
                return view('reportes.ventas.index',["ventas"=>$ventas, "sucursales"=>$sucursales, "categorias"=>$categorias,"fechaInicio"=>$fechaInicio,"fechaFinal"=>$fechaFinal]);
            }
        }


        public function indexE(Request $request){
        
                if($request){
    
                    $query = trim($request->get('searchText'));
                    $categoria=DB::table('productos as p')
                    ->join('categorias as c','c.idcategoria','=','p.idcategoria')
                    ->where('p.estado','=','1')
                    ->select(DB::raw('count(c.nombre) as total'),'c.nombre')
                    ->groupBy('c.nombre')
                    ->get();

                    // select count(s.idsucursales) as idsuc, s.nombre as sucursal from ventas as v INNER JOIN productos as p on v.idproducto = p.idproducto INNER JOIN sucursales as s on s.idsucursales = p.idsucursal where v.estado = 1 group by s.idsucursales
                    $sucursal=DB::table('ventas as v')
                    ->join('productos as p','v.idproducto','=','p.idproducto')
                    ->join('sucursales as s', "s.idsucursales","=","p.idsucursal")
                    ->where('v.estado','=','1')
                    ->select(DB::raw('count(s.idsucursales) as total'),'s.nombre')
                    ->groupBy('s.idsucursales')
                    ->get();

                    $categoria_mas_vendida=DB::table('ventas as v')
                    ->join('productos as p','v.idproducto','=','p.idproducto')
                    ->join('categorias as c', "c.idcategoria","=","p.idcategoria")
                    ->where('v.estado','=','1')
                    ->select(DB::raw('count(c.idcategoria) as total'),'c.nombre')
                    ->groupBy('c.idcategoria')
                    ->get();


                    // dd($categoria_mas_vendida);
        
                    return view('reportes.estadisticas.general.index',['categoria'=>$categoria,'sucursal'=>$sucursal,'categoria_mas_vendida'=>$categoria_mas_vendida]);
                }
    }

    // redirecciona a la parte de estadistica grafica

    public function indexGraphicSucursal(){

        $sucursales = DB::table('sucursales')->where('condicion','=','1')->get();

        return view('reportes.estadisticas.porSucursal.index',['sucursales'=>$sucursales]);
    }


//  funcio para respuesta ajax
    public function getCountSucursal(Request $request){
        if ($request->ajax()) {
            $id = $request->get('id');

            $categoria=DB::table('productos as p')
            ->join('categorias as c','c.idcategoria','=','p.idcategoria')
            ->where('p.estado','=','1')
            ->where('p.idsucursal','=',$id)
            ->select(DB::raw('count(c.nombre) as total'),'c.nombre')
            ->groupBy('c.nombre')
            ->get();

            

            $categoria_mas_vendida=DB::table('ventas as v')
            ->join('productos as p','v.idproducto','=','p.idproducto')
            ->join('categorias as c', "c.idcategoria","=","p.idcategoria")
            ->where('v.estado','=','1')
            ->where('p.idsucursal','=',$id)
            ->select(DB::raw('count(c.idcategoria) as total'),'c.nombre')
            ->groupBy('c.idcategoria')
            ->get();





          return  response()->json([
              'categoria'=>$categoria,
              'categoria_mas_vendida'=>$categoria_mas_vendida
          ]
                
                 
            );
        }
    }
   
}
