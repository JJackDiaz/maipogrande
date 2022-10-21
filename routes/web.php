<?php

use Illuminate\Support\Facades\Route;
//use Auth;

Route::get('/', 'WelcomeController@index')->name('welcome');
route::get('/404', function () {
    return view('error.index');
});

Auth::routes();

//protegidas
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');


// Route::middleware('admin')->group(function(){
//     //usuario
//     Route::resource('usuario','UsuarioController');
//     Route::resource('contrato','contratoController');
    
// });

// Route::middleware('productor')->group(function(){
//     //Productor
//     Route::get('productor', 'ProductorController@index')->name('productor.index');
//     Route::get('productor/contrato', 'ProductorController@contrato')->name('productor.contrato');
//     Route::post('productor/contrato/{id}', 'ProductorController@aceptar_contrato')->name('productor.aceptar_contrato');
    
// });

    //usuarios
    Route::resource('usuario','UsuarioController');
    Route::resource('proceso-venta','ProcesoVentaController');
    //contratos+
    Route::resource('contrato','ContratoController');
    Route::get('/ver-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
    Route::get('/index', 'ContratoController@index')->name('contrato.index');
    Route::get('/contrato', 'ContratoController@contrato')->name('contrato.contrato');
    Route::post('/aceptar-contrato/{id}', 'ContratoController@aceptar_contrato')->name('contrato.aceptar_contrato');
    Route::get('/contrato-pdf', 'ContratoController@ver_pdf')->name('ver-pdf');
    //solicitudes
    Route::get('solicitud', 'SolicitudController@index')->name('solicitud.index');

    //Productos
    Route::resource('producto','ProductoController');
    //Proceso venta
    //Ganancias


    //solicitud
    Route::get('/solicitud', 'solicitudController@index')->name('solicitud.index');
    Route::get('/solicitud/create', 'solicitudController@create')->name('solicitud.create');
    Route::post('/solicitud', 'solicitudController@store')->name('solicitud.store');
    Route::get('/solicitud/{solicitud}/show', 'solicitudController@show')->name('solicitud.show');
    Route::get('/solicitud/{solicitud}/edit', 'solicitudController@edit')->name('solicitud.edit');
    Route::post('/solicitud/{solicitud}', 'solicitudController@update')->name('solicitud.update');
    Route::DELETE('/solicitud/{solicitud}', 'solicitudController@destroy')->name('solicitud.destroy');
    Route::post('/solicitud/{solicitud}/pending', 'solicitudController@estado_pendiente')->name('solicitud.estado_pendiente');
    //detalle_cliente
    Route::resource('detalle_cliente','DetalleClienteController');

});  

   /////////////////
  //PRUEBAS BD/////
 /////////////////
// route::get('/', function () {
//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
// route::get('/datos', function () {

//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
