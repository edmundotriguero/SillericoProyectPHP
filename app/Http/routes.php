<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::resource('almacen/producto','ProductoController');
Route::resource('almacen/color','ColorController');
Route::resource('almacen/tela','TelaController');
Route::resource('almacen/talla','TallaController');
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/sucursal','SucursalController');
Route::resource('almacen/movimiento','MovimientoController');
// para registrar los moviminetos de todo un lote

Route::get('almacen/createLote','MovimientoController@createLote');
// routa ajax
Route::post('almacen/movLista','MovimientoController@movLista');
// ruta para realizar un update a la tabla de los productos para mover los productos en cantidad
Route::post('almacen/storeMovLote','MovimientoController@storeMovLote');


// routes de lote 
Route::resource('almacen/lote','LoteController');


Route::resource('reportes/ventas','ReportesController');

Route::resource('invitado','InvitadoController');

Route::resource('ventas/ventas','VentasController');


Route::get('ventas/indexSaldo','VentasController@indexSaldos');

Route::get('ventas/crearSaldo/{idventa}','VentasController@crearSaldo');
Route::post('ventas/storeSaldos','VentasController@storeSaldos');

Route::get('reportes/estadisticas','ReportesController@indexE');

//para asignar descuentos
// ver si elminiar estas rutas



//para generar excel

Route::get('report/excel_productos/{param}','ExcelReportController@excel_producto');

Route::auth();

Route::get('/home', 'HomeController@index');






