<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use sillericos\Categoria;
use Illuminate\Support\Facades\Redirect;

use sillericos\Http\Requests\CategoriaFormRequest;
use DB;
 
class CategoriaController extends Controller
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
            $categorias=DB::table('categorias')->where('nombre','LIKE','%'.$query.'%')
           ->where('condicion','=','1')
           ->orderBy('nombre','asc')
           ->paginate(50);

            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }


    }
    public function create(){
        return view("almacen.categoria.create");

    }
    public function store(CategoriaFormRequest $request) {
        $categoria =new Categoria;
        $categoria->nombre=$request->get('nombre');
        
        $categoria->condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }
    public function show($id) {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id){
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id){ 
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        
        $categoria->update();

        return Redirect::to('almacen/categoria');
    }

    public function destroy($id){
       // $var = base64_decode($id);
       $categoria = Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();

        return Redirect::to('almacen/categoria');

    }

    
}
