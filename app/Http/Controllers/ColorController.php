<?php

namespace sillericos\Http\Controllers;

use Illuminate\Http\Request;

use sillericos\Http\Requests;

use sillericos\Color;
use Illuminate\Support\Facades\Redirect;

use sillericos\Http\Requests\ColorFormRequest;
use DB;

class ColorController extends Controller
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
            $colores=DB::table('color')->where('nombre','LIKE','%'.$query.'%')
           ->where('estado','=','1')
           ->orderBy('idcolor','asc')
           ->paginate(50);

            return view('almacen.color.index',["colores"=>$colores,"searchText"=>$query]);
        }


    }
    public function create(){
        return view("almacen.color.create");

    }
    public function store(ColorFormRequest $request) {
        $color =new Color;
        $color->nombre=$request->get('nombre');
        
        $color->estado='1';
        $color->save();
        return Redirect::to('almacen/color');
    }
    public function show($id) {
        return view("almacen.color.show",["color"=>Color::findOrFail($id)]);
    }

    public function edit($id){
        return view("almacen.color.edit",["color"=>Color::findOrFail($id)]);
    }

    public function update(ColorFormRequest $request, $id){ 
        $color = Color::findOrFail($id);
        $color->nombre=$request->get('nombre');
        
        $color->update();

        return Redirect::to('almacen/color');
    }

    public function destroy($id){
       // $var = base64_decode($id);
       $color = Color::findOrFail($id);
        $color->estado='0';
        $color->update();

        return Redirect::to('almacen/color');

    }
}
