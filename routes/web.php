<?php

use Illuminate\Support\Facades\Route;
//use Auth;

//Route::get('/', 'WelcomeController@index')->name('welcome');
route::get('/', function () {
    return view('about');
});
//SHOP
Route::get('/shop', 'CartController@shop')->name('shop');
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');

route::get('/404', function () {
    return view('error.index');
});
 
route::get('/pagar', function () {
    return view('pagar');
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
    Route::resource('proceso-venta','ProcesoVentaController');
    Route::get('/proceso-venta/{solicitud}/create', 'ProcesoVentaController@crear_proceso_venta')->name('proceso-venta.crear_proceso_venta');
    Route::get('participar/{id}', 'ProcesoVentaController@participar')->name('proceso-venta.participar');
    Route::get('participar_proceso/{id}', 'ProcesoVentaController@participar_proceso')->name('proceso-venta.participar_proceso');
    Route::get('participantes/{id}', 'ProcesoVentaController@participantes')->name('proceso-venta.participantes');
    Route::get('procesamiento/{id}', 'ProcesoVentaController@procesamiento')->name('proceso-venta.procesamiento');
    
    Route::get('checkout-proceso', 'ProcesoVentaController@checkout_proceso')->name('proceso-venta.checkout-proceso');

    //saldo
    Route::get('/saldos', 'SaldoController@index')->name('saldo.index');

    //solicitud
    Route::get('/solicitud', 'solicitudController@index')->name('solicitud.index');
    Route::get('/solicitud/create', 'solicitudController@create')->name('solicitud.create');
    Route::post('/solicitud', 'solicitudController@store')->name('solicitud.store');
    Route::get('/solicitud/{solicitud}/show', 'solicitudController@show')->name('solicitud.show');
    Route::get('/solicitud/{solicitud}/edit', 'solicitudController@edit')->name('solicitud.edit');
    Route::post('/solicitud/{solicitud}', 'solicitudController@update')->name('solicitud.update');
    Route::DELETE('/solicitud/{solicitud}', 'solicitudController@destroy')->name('solicitud.destroy');
    Route::post('/solicitud/{solicitud}/activo', 'solicitudController@activo')->name('solicitud.activo');
    Route::get('/solicitud/{solicitud}/anular', 'solicitudController@anular')->name('solicitud.anular');
    //detalle_cliente
    Route::resource('detalle_cliente','DetalleClienteController');

});  

//PAYPAL
Route::get('/aaa', 'PayPalController@getIndex');
Route::get('paypal/ec-checkout', 'PayPalController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'PayPalController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
Route::post('paypal/notify', 'PayPalController@notify');

   /////////////////
  //PRUEBAS BD/////
 /////////////////
// route::get('/', function () {
//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
// route::get('/datos', function () {

//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
