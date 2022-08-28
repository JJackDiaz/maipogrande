<?php

use Illuminate\Support\Facades\Route;



//Route::get('/', 'WelcomeController@index')->name('welcome');

route::get('/', function () {

    return view('home');
});

// route::get('/datos', function () {

//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });

Auth::routes();

//protegidas
// Route::middleware('auth')->group(function(){
//     //Route::get('home', 'HomeController@index')->name('home');
// });

