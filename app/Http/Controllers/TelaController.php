<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sillericos\Tela;
use sillericos\Http\Requests\TelaFormRequest;
use DB;

class TelaController extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth');
       $this->middleware('isAdmin');
    }

    public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $telas=DB::table('telas')->where('nombre','LIKE','%'.$query.'%')
           ->where('condicion','=','1')
           ->orderBy('idtela','asc')
           ->paginate(50);

            return view('almacen.tela.index',["telas"=>$telas,"searchText"=>$query]);
        }


    }
    public function create(){
        return view("almacen.tela.create");

    }
    public function store(TelaFormRequest $request) {

        try {
            $tela =new Tela;

        
            $tela->nombre=$request->get('nombre');
            
            $tela->condicion='1';
            $tela->save();
            return Redirect::to('almacen/tela');
 
        }catch (\Illuminate\Database\QueryException $e){
        
            return redirect()->back()->withErrors('Verfique que no exista el registro o alguna restriccion en la Base de datos');
        }

    }
    public function show($id) {
        return view("almacen.tela.show",["tela"=>Tela::findOrFail($id)]);
    }

    public function edit($id){
        return view("almacen.tela.edit",["tela"=>Tela::findOrFail($id)]);
    }

    public function update(TelaFormRequest $request, $id){
        try {
        $tela = Tela::findOrFail($id);
        $tela->nombre=$request->get('nombre');
        
        $tela->update();

        return Redirect::to('almacen/tela');
    }catch (\Illuminate\Database\QueryException $e){
        return redirect()->back()->withErrors('Verfique que no exista el registro o alguna restriccion en la Base de datos');
    }
    }

    public function destroy($id){
       // $var = base64_decode($id);
        $tela = Tela::findOrFail($id);
        $tela->condicion='0';
        $tela->update();

        return Redirect::to('almacen/tela');

    }
}
