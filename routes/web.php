<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('welcome');
    // route::get('/', function () {
    //     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
    // });
// route::get('/datos', function () {

//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });

Auth::routes();

//protegidas
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/productor', 'ProductorController@index')->name('productor.index');
    
});

Route::middleware('admin')->group(function(){
    //usuario
    Route::resource('usuario','UsuarioController');
});



