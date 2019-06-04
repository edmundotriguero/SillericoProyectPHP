<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;
use sillericos\Http\Controllers\Controller;
use DB;
use Excel;
use PDO;

class ExcelReportController extends Controller
{
    public  function __construct()
    {
        # code...
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function excel_producto($param){

          $array = explode("-", $param);
                $idtal = $array[0];//
                $idcat = $array[1];//
                $idsuc = $array[2];//
        
        if ( $idcat != '' && $idsuc != '') {
            // $query = trim($request->get('searchText'));
                //$idcat = trim($request->get('idcat'));
                //$idsuc = trim($request->get('idsuc'));
               // $precio = trim($request->get('precio'));//
               // $idtal = trim($request->get('idtal'));
               // $nombreTalla = trim($request->get('nombreTalla'));
               DB::setFetchMode(PDO::FETCH_ASSOC);
                
                
        
                $data=DB::table('productos as p')
                ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
                ->join('telas as t','p.idtela','=','t.idtela')
                ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
                ->join('color as co', 'p.idcolor','=','co.idcolor')
                ->join('tallas as ta','p.idtalla','=','ta.idtalla')
                ->join('lote as l','p.lote','=','l.id')
                ->where('p.estado','=','1')
                //->where('p.codigo','LIKE','%'.$query.'%')
                ->where('p.idcategoria','=',$idcat)
                ->where('p.idsucursal','=',$idsuc)
               // ->where('p.precio','LIKE','%'.$precio.'%')
                //->where('p.idtalla','LIKE',$idtal)
                
        
                ->select('p.idproducto as ID','p.codigo','p.fechaCod as FechaCod','co.nombre as Color','ta.nombre as Talla','t.nombre as Tela','p.precio as PrecioInicial',DB::raw('p.precio - (p.precio * l.porcentaje_descuento /100) as precioConDescuento'),'c.nombre as Categoria','s.nombre as Sucursal','l.lote as Lote')
                ->orderBy('p.idproducto','asc')
                ->get();
        
                DB::setFetchMode(PDO::FETCH_CLASS);   

               // dd($productos);
        Excel::create('Productos', function($excel) use($data) {

            $excel->sheet('datos', function($sheet) use($data) {
        
                $sheet->fromArray($data);
               //$sheet->setOrientation('landscape');
                
            });
        
        })->export('xlsx');
        }

        elseif($idsuc != ''){
            DB::setFetchMode(PDO::FETCH_ASSOC);
                
                
        
            $data=DB::table('productos as p')
            ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
            ->join('telas as t','p.idtela','=','t.idtela')
            ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
            ->join('color as co', 'p.idcolor','=','co.idcolor')
            ->join('tallas as ta','p.idtalla','=','ta.idtalla')
            ->join('lote as l','p.lote','=','l.id')
            ->where('p.estado','=','1')
            //->where('p.codigo','LIKE','%'.$query.'%')
            
            ->where('p.idsucursal','=',$idsuc)
           // ->where('p.precio','LIKE','%'.$precio.'%')
            //->where('p.idtalla','LIKE',$idtal)
            
    
            ->select('p.idproducto as ID','p.codigo','p.fechaCod as FechaCod','co.nombre as Color','ta.nombre as Talla','t.nombre as Tela','p.precio as PrecioInicial',DB::raw('p.precio - (p.precio * l.porcentaje_descuento /100) as precioConDescuento'),'c.nombre as Categoria','s.nombre as Sucursal','l.lote as Lote')
            ->orderBy('p.idproducto','asc')
            ->get();
    
            DB::setFetchMode(PDO::FETCH_CLASS);   

           // dd($productos);
            Excel::create('Productos', function($excel) use($data) {

            $excel->sheet('datos', function($sheet) use($data) {
    
            $sheet->fromArray($data);
           //$sheet->setOrientation('landscape');
            
        });
    
    })->export('xlsx');

        }
        else{
            return redirect()->back()->withErrors('Antes tiene que hacer una busqueda: Recuerde que solo genera el repote de sucursal y/o categoria ya definida...');

        }      
    }

    public function excel_ventas(){
        
    }


}
