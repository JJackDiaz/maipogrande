<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


route::get('/datos', function () {

    return $response = Http::post('http://localhost/apirest_mGrande/auth', [
    'name' => 'Steve',
    'role' => 'Network Administrator',
    ]);
});

//Auth::routes();

Route::get('home', 'HomeController@index')->name('home');



//auth
Route::prefix('auth')->group(function(){
    Route::get('login', 'LoginApiController@login')->name('login');
    Route::post('login', 'LoginApiController@loginVerify')->name('login.verify');
});

//protegidas
Route::middleware('auth')->group(function(){
    Route::get('productor/index', 'ProductorController@index')->name('productor');
});



