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
        $lote =new Lote;
        $lote->lote=$request->get('lote');
        $lote->porcentaje_descuento=$request->get('porcentaje_descuento');
        $lote->estado='1';
        $lote->save();
        return Redirect::to('almacen/lote');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // cuando se mande a llamar a la funcion show mostrar todos los productos que pertenecen a este lote 
        //return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
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
        $lote = Lote::findOrFail($id);
        $lote->lote=$request->get('lote');
        $lote->porcentaje_descuento=$request->get('porcentaje_descuento');
        $lote->update(); 

        return Redirect::to('almacen/lote');
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
