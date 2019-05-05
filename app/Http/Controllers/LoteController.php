<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use DB;
use sillericos\Lote;

class LoteController extends Controller
{
    public  function __construct()
    {
        # code...
        $this->middleware('auth');
       $this->middleware('isAdmin');
       // $this->middleware('permission');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('searchText'));
            $lotes=DB::table('lote')
            ->where('lote','LIKE','%'.$query.'%')
           ->where('estado','=',1)
           ->orderBy('id','desc')
           ->paginate(50);

            return view('almacen.lote.index',["lotes"=>$lotes,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("almacen.lote.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $lote =new Lote;
            $lote->lote=$request->get('lote');
            $lote->porcentaje_descuento=$request->get('porcentaje_descuento');
            $lote->estado='1';
            $lote->save();
            return Redirect::to('almacen/lote');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('Verfique que no exista el registro o alguna restriccion en la Base de datos: comuniquese con el Administrador');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productos=DB::table('productos as p')
        ->join('categorias as c', 'p.idcategoria', '=', 'c.idcategoria')
        ->join('telas as t','p.idtela','=','t.idtela')
        ->join('sucursales as s','p.idsucursal','=','s.idsucursales')
        ->join('color as co', 'p.idcolor','=','co.idcolor')
        ->join('tallas as ta','p.idtalla','=','ta.idtalla')
        ->join('lote as l','p.lote','=','l.id')
        ->where('p.estado','=','1')
        ->where('l.id','=',$id)
        ->select('p.idproducto','p.fechaCod','p.codigo','co.nombre as color','ta.nombre as talla','t.nombre as tela','p.precio','c.nombre as categoria','s.nombre as sucursal')
        ->orderBy('p.idproducto','asc')
        ->get();

        return view("almacen.lote.show",["productos"=>$productos,"lote"=>Lote::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("almacen.lote.edit",["lote"=>Lote::findOrFail($id)]);
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
        try {
            $lote = Lote::findOrFail($id);
            $lote->lote=$request->get('lote');
            $lote->porcentaje_descuento=$request->get('porcentaje_descuento');
            $lote->update(); 

            return Redirect::to('almacen/lote');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('Verfique que no exista el registro o alguna restriccion en la Base de datos: comuniquese con el Administrador');
        }
        
    }

    /**x
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lote = Lote::findOrFail($id);
        $lote->estado='0';
        $lote->update();

        return Redirect::to('almacen/lote');

    }
}
