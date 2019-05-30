<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;
use DB;
use sillericos\Sucursal;
use Illuminate\Support\Facades\Redirect;
use sillericos\Http\Requests\SucursalFormRequest;

class SucursalController extends Controller
{
    public  function __construct()
    {
        # code...
        $this->middleware('auth');
       $this->middleware('isAdmin');
       // $this->middleware('permission');
    }

    public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $sucursales=DB::table('sucursales')->where('nombre','LIKE','%'.$query.'%')
           ->where('condicion','=','1')
           ->orderBy('nombre','asc')
           ->paginate(50);

            return view('almacen.sucursal.index',["sucursales"=>$sucursales,"searchText"=>$query]);
        }


    }
    public function create(){
        return view("almacen.sucursal.create");

    }
    public function store(SucursalFormRequest $request) {
        $sucursal =new Sucursal;
        $sucursal->nombre=$request->get('nombre');
        $sucursal->direccion=$request->get('direccion');
        $sucursal->condicion='1';
        $sucursal->save();
        return Redirect::to('almacen/sucursal');
    }
    public function show($id) {
       // return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
       return view('almacen.sucursal.index');
    }

    public function edit($id){
        return view("almacen.sucursal.edit",["sucursal"=>Sucursal::findOrFail($id)]);
    }

    public function update(SucursalFormRequest $request, $id){ 
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre=$request->get('nombre');
        $sucursal->direccion=$request->get('direccion');
        $sucursal->update();

        return Redirect::to('almacen/sucursal');
    }

    public function destroy($id){
       // $var = base64_decode($id);
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->condicion='0';
        $sucursal->update();

        return Redirect::to('almacen/sucursal');

    }
}
