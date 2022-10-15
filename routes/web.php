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
    Route::get('', 'ProductorController@index')->name('productor.index');
    Route::get('/contrato', 'ProductorController@contrato')->name('productor.contrato');
    Route::post('/aceptar-contrato/{id}', 'ProductorController@aceptar_contrato')->name('productor.aceptar_contrato');
    Route::get('/mi-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
});

Route::group(['prefix' => 'externo'], function() {
    //Productor
    Route::get('/solicitudes', 'ClienteExternoController@solicitud')->name('cliente_externo.solicitud');
    Route::get('/business', 'ClienteExternoController@business')->name('cliente_externo.business');
    Route::get('/create-business', 'ClienteExternoController@create_business')->name('cliente_externo.create_business');
    Route::post('/store-business', 'ClienteExternoController@store_business')->name('cliente_externo.store_business');
    Route::get('/create/solicitud', 'solicitudController@create')->name('solicitud.create');
    Route::get('/create', 'solicitudController@store')->name('solicitud.store');
        
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
