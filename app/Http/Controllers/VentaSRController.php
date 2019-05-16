<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use DB;

use sillericos\Producto;
use sillericos\Ventas;
use sillericos\Saldo;

class VentaSRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categorias=DB::table('categorias')->where('condicion','LIKE','1')->get();
        $sucursales=DB::table('sucursales')->where('condicion','LIKE','1')->get();
        $color=DB::table('color')->where('estado','LIKE','1')->get();
        $talla=DB::table('tallas')->where('estado','LIKE','1')->get();
        $telas=DB::table('telas')->where('condicion','LIKE','1')->get();
        $lotes=DB::table('lote')->where('estado','LIKE','1')->orderBy('id','desc')->get();

        return view("ventas.ventaSinRegistro.create",["categorias"=>$categorias,"sucursales"=>$sucursales,"telas"=>$telas,"talla"=>$talla,"color"=>$color,"lotes"=>$lotes]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // try {
            DB::beginTransaction();
            // variablre para definir el numero de lote cambiar de acuerdo a la base de datos
            $lote = 36;
            // fin

            $bandera = $request->get('bandera');
            //si bandera es igual a 3 ingresa todos los campos 
            if($bandera == 3){

            
            $cliente = $request->get('cliente');
            $fechaVenta = $request->get('fechaVenta');
            $idtipoDoc = $request->get('idtipoDoc');
            $numDoc = $request->get('numDoc');
            $precio = $request->get('precio');

            // datos de producto

            $idcategoria = $request->get('idcategoria');
            $idsucursal = $request->get('idsucursal');
            $idtalla = $request->get('idtalla');
            $idtela = $request->get('idtela');
            $idcolor = $request->get('idcolor');
            
           
            $cont = 0;

            while ($cont < count($numDoc)) {
                $producto = new Producto();
                $producto->idcategoria = $idcategoria[$cont];
                $producto->idsucursal = $idsucursal[$cont];
                $producto->fechaCod = $fechaVenta[$cont];
                //  $producto->codigo = 'sincod';
                $producto->idtalla = $idtalla[$cont];
                $producto->idtela = $idtela[$cont];
                $producto->idcolor = $idcolor[$cont];
                $producto->precio = $precio[$cont];
                $producto->estado = '2';
                $producto->lote = $lote;
                $producto->save();
                


                $ventas = new Ventas();
                $ventas->idproducto = $producto->idproducto;
                $ventas->cliente = $cliente[$cont];
                $ventas->fechaVenta = $fechaVenta[$cont];
                $ventas->tipoDoc = $idtipoDoc[$cont];
                $ventas->numDoc = $numDoc[$cont];
                $ventas->costoVenta = $precio[$cont];
                $ventas->ingreso = $precio[$cont];
               
                $ventas->estado = '1';
                 $ventas->save();

                     
                $cont = $cont + 1;
            }
            // si bandera es igual a 1, guarda tambien en ventas saldo solo permitir una instancia de venta
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
