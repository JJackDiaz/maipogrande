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
    //Transportista
    Route::get('/transportista', 'TransportistaController@index')->name('transportista.index');
});

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

Route::group(['prefix' => ''], function() {
    //usuarios
    Route::resource('usuario','UsuarioController');
    Route::resource('proceso-venta','ProcesoVentaController');
    //contratos
    Route::resource('contrato','ContratoController');
    Route::get('/ver-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
    //solicitudes
    Route::get('solicitud', 'SolicitudController@index')->name('solicitud.index');
});


Route::group(['prefix' => 'productor'], function() {
    //Productor
    //Productos
    //Contrato
    Route::get('', 'ProductorController@index')->name('productor.index');
    Route::get('/contrato', 'ProductorController@contrato')->name('productor.contrato');
    Route::post('/aceptar-contrato/{id}', 'ProductorController@aceptar_contrato')->name('productor.aceptar_contrato');
    Route::get('/mi-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
    //Proceso venta
    //Ganancias
});

Route::group(['prefix' => 'externo'], function() {
    //externo
    //solicitud
    Route::get('/solicitud', 'solicitudController@index')->name('solicitud.index');
    Route::get('/solicitud/create', 'solicitudController@create')->name('solicitud.create');
    Route::post('/solicitud', 'solicitudController@store')->name('solicitud.store');
    Route::get('/solicitud/{solicitud}/show', 'solicitudController@show')->name('solicitud.show');
    Route::get('/solicitud/{solicitud}/edit', 'solicitudController@edit')->name('solicitud.edit');
    Route::post('/solicitud/{solicitud}', 'solicitudController@update')->name('solicitud.update');
    Route::DELETE('/solicitud/{solicitud}', 'solicitudController@destroy')->name('solicitud.destroy');
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
