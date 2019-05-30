<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;



use sillericos\Talla;
use Illuminate\Support\Facades\Redirect;

use sillericos\Http\Requests\TallaFormRequest;
use DB;

class TallaController extends Controller
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
            $tallas=DB::table('tallas')->where('nombre','LIKE','%'.$query.'%')
           ->where('estado','=','1')
           ->orderBy('nombre','asc')
           ->paginate(50);

            return view('almacen.talla.index',["tallas"=>$tallas,"searchText"=>$query]);
        }


    }
    public function create(){
        return view("almacen.talla.create");

    }
    public function store(TallaFormRequest $request) {
        $talla =new Talla;
        $talla->nombre=$request->get('nombre');
        
        $talla->estado='1';
        $talla->save();
        return Redirect::to('almacen/talla');
    }
    public function show($id) {
        return view("almacen.talla.show",["talla"=>Talla::findOrFail($id)]);
    }

    public function edit($id){
        return view("almacen.talla.edit",["talla"=>Talla::findOrFail($id)]);
    }

    public function update(TallaFormRequest $request, $id){ 
        $talla = Talla::findOrFail($id);
        $talla->nombre=$request->get('nombre');
        
        $talla->update();

        return Redirect::to('almacen/talla');
    }

    public function destroy($id){
       // $var = base64_decode($id);
       $talla = Talla::findOrFail($id);
        $talla->estado='0';
        $talla->update();

        return Redirect::to('almacen/talla');

    }
}
