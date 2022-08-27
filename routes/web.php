<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index')->name('welcome2');

route::get('/datos', function () {

    return $response = Http::post('http://localhost/apirest_mGrande/auth', [
    'email' => 'jorge@gmail.com',
    'contrasena' => '123456',
    ]);
});

//Auth::routes();



//auth
Route::prefix('auth')->group(function(){
    Route::get('/login', 'LoginApiController@login')->name('login');
    Route::post('/login', 'LoginApiController@loginVerify')->name('login.verify');
});

//protegidas
Route::middleware('auth')->group(function(){
});

Route::get('productor/index', 'ProductorController@index')->name('productor');


