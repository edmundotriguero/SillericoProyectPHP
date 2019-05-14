<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use DB;

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
        //
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
