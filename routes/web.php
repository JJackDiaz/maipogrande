<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('welcome');

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
    //usuario
    Route::resource('usuario','UsuarioController');
    Route::resource('contrato','ContratoController');
    Route::get('/ver-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
});


Route::group(['prefix' => 'productor'], function() {
    //Productor
    Route::get('', 'ProductorController@index')->name('productor.index');
    Route::get('/contrato', 'ProductorController@contrato')->name('productor.contrato');
    Route::post('/aceptar-contrato/{id}', 'ProductorController@aceptar_contrato')->name('productor.aceptar_contrato');
    Route::get('/mi-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
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
