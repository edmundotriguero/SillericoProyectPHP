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
                ->paginate(50);
    
                return view('reportes.ventas.index',["ventas"=>$ventas, "sucursales"=>$sucursales, "categorias"=>$categorias]);
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

                    //$ventas=DB::table('ventas_detalle as vd')
                                       
                    //->select(DB::raw('count(sucursal) as total'),'sucursal')
                    //->groupBy('sucursal')
                   // ->get();
                   // $ventas=DB::select('select count(sucursal) as total, sucursal from ventas_detalle as vd group by sucursal');
        
                    return view('reportes.estadisticas.index',['categoria'=>$categoria]);
                }
    }

    public function indexGraphicSucursal(){

        $sucursales = DB::table('sucursales')->where('condicion','=','1')->get();

        return view('reportes.estadisticas.productos.index',['sucursales'=>$sucursales]);
    }



    public function getCountSucursal(Request $request){
        if ($request->ajax()) {
            $id_sucursal = $request->get('idSucursal');

          return  response()->json(
                $id_sucursal
            );
        }
    }
   
}
