<?php

use Illuminate\Support\Facades\Route;

use App\Mail\AlertaMailable;
use App\Pais;
use App\Ciudad;
use App\Zona;
use Illuminate\Support\Facades\Http;

// route::get('cargarpais', function () {
    
//     //API PAISES
//     $response = Http::withHeaders([
//         "Accept" => "application/json",
//         "api-token" => "XBQL0yRnz5P77EuFVM8oISGf2sP-T3fiXvaVJArJUaMpMvqxdw_d1ihtrNW7dUnRxQk",
//         "user-email" => "jorgejack70@gmail.com"
//     ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

//     $array = (array)$response->json(["auth_token"]);

//     foreach ($array as $key => $value) {
//         $this->token = $value;
//     }

//     $pais = Http::withHeaders([
//         "Authorization" => 'Bearer '. $this->token,
//         "Accept" => "application/json"
//     ])->get('https://www.universal-tutorial.com/api/countries/');

//     $paises = $pais->json();

//     foreach ($paises as $pais) {
//         $p = new Pais();
//         $p->nombre = $pais['country_name'];
//         $p->nombre_corto = $pais['country_short_name'];
//         $p->save();
    
//     }
//     return 'listo';
// });
//Route::get('/', 'WelcomeController@index')->name('welcome');
route::get('alerta', function () {

    $correo = new AlertaMailable;

    Mail::to('jjackdiaz.10@gmail.com')->send(new $correo);
    
    return 'listo';
});


route::get('/', function () {
    return view('about');
})->name('welcome');

//SHOP
Route::get('shop', 'CartController@shop')->name('shop');
Route::post('add', 'CartController@add')->name('cart.store');
Route::post('update', 'CartController@update')->name('cart.update');
Route::post('remove', 'CartController@remove')->name('cart.remove');
Route::post('clear', 'CartController@clear')->name('cart.clear');

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
    //contratos
    Route::resource('contrato','ContratoController');
    Route::get('/ver-contrato', 'ContratoController@ver_pdf')->name('ver-pdf');
    Route::get('/index', 'ContratoController@index')->name('contrato.index');
    Route::get('/contrato', 'ContratoController@contrato')->name('contrato.contrato');
    Route::post('/aceptar-contrato/{id}', 'ContratoController@aceptar_contrato')->name('contrato.aceptar_contrato');
    Route::get('/contrato-pdf', 'ContratoController@ver_pdf')->name('ver-pdf');

    //Productos
    Route::resource('producto','ProductoController');
    
    //Proceso venta
    Route::resource('proceso-venta','ProcesoVentaController');
    Route::get('/proceso-venta/{solicitud}/create', 'ProcesoVentaController@crear_proceso_venta')->name('proceso-venta.crear_proceso_venta');
    Route::get('participar/{id?}', 'ProcesoVentaController@participar')->name('proceso-venta.participar');
    Route::get('participar_proceso/{id}', 'ProcesoVentaController@participar_proceso')->name('proceso-venta.participar_proceso');
    Route::get('participantes/{id}', 'ProcesoVentaController@participantes')->name('proceso-venta.participantes');
    Route::get('procesamiento/{id}', 'ProcesoVentaController@procesamiento')->name('proceso-venta.procesamiento');
    Route::get('recibido/{id}', 'ProcesoVentaController@estado_recibido')->name('proceso-venta.recibido');
    
    Route::get('checkout-proceso/{id}', 'ProcesoVentaController@checkout_proceso')->name('proceso-venta.checkout-proceso');

    //saldo
    Route::get('/saldos', 'SaldoController@index')->name('saldo.index');

    //solicitud
    Route::get('solicitud', 'SolicitudController@index')->name('solicitud.index');
    Route::get('/solicitud', 'solicitudController@index')->name('solicitud.index');
    Route::get('/solicitud/create', 'solicitudController@create')->name('solicitud.create');
    Route::post('/solicitud', 'solicitudController@store')->name('solicitud.store');
    Route::get('/solicitud/{solicitud}/show', 'solicitudController@show')->name('solicitud.show');
    Route::get('/solicitud/{solicitud}/edit', 'solicitudController@edit')->name('solicitud.edit');
    Route::post('/solicitud/{solicitud}', 'solicitudController@update')->name('solicitud.update');
    Route::DELETE('/solicitud/{solicitud}', 'solicitudController@destroy')->name('solicitud.destroy');
    Route::post('/solicitud/{solicitud}/activo', 'solicitudController@activo')->name('solicitud.activo');
    Route::get('/solicitud/{solicitud}/anular', 'solicitudController@anular')->name('solicitud.anular');

    //subasta Externo
    Route::resource('subasta','SubastaExternoController');
    Route::get('/crear-subasta/{id}', 'SubastaExternoController@crear_subasta')->name('crear_subasta');
    Route::get('/subasta-participantes/{id}', 'SubastaExternoController@subasta_participantes')->name('subasta.participantes');
    Route::get('/participar-externo/{id}', 'SubastaExternoController@participar')->name('subasta.participar');
    Route::post('/subasta-participar/{id}', 'SubastaExternoController@subasta_participar')->name('subasta.subasta-participar');
    Route::get('/subasta-seleccion/{id}', 'SubastaExternoController@seleccion_subasta')->name('subasta.seleccion');

     //subasta Local
     Route::resource('subasta_local','SubastaLocalController');
     Route::get('/crear-subasta-local/{id}', 'SubastaLocalController@crear_subasta_local')->name('crear_subasta_local');
     Route::get('/subasta-participantes-local/{id}', 'SubastaLocalController@subasta_participantes_local')->name('subasta.participantes-local');
     Route::get('/participar-local/{id}', 'SubastaLocalController@participar_local')->name('subasta.participar-local');
     Route::post('/subasta-participar-local/{id}', 'SubastaLocalController@subasta_participar_local')->name('subasta.subasta-participar-local');
     Route::get('/subasta-seleccion-local/{id}', 'SubastaLocalController@seleccion_subasta_local')->name('subasta.seleccion-local');

    //transporte
    Route::resource('transporte','TransporteController');

    //perdidos
    Route::resource('pedido','PedidoController');
    Route::get('recibir-pedido/{id}','PedidoController@estado_recibido')->name('pedido.recibido');
    Route::get('crear-pedido/{id}', 'CartController@crear_pedido')->name('cart.crear_pedido');
    Route::post('store-pedido/{id}', 'CartController@store_pedido')->name('cart.store_pedido');

    //carrito
    Route::get('cart', 'CartController@cart')->name('cart.index');
    Route::get('checkout/{id}', 'CartController@checkout')->name('cart.checkout');
    
    
    
});  

//seguimiento local
Route::get('seguimiento', 'SeguimientoController@seguimiento')->name('seguimiento');
Route::get('seguimiento_local', 'SeguimientoController@seguimiento_local')->name('seguimiento_local');
Route::get('seguimiento_externo/', 'SeguimientoController@seguimiento_externo');

//PAYPAL
Route::post('pay', 'PaymentController@pay')->name('payment');
Route::get('/success/{id}', 'PaymentController@success')->name('success');
Route::get('/error', 'PaymentController@error')->name('error');

//PAYPAL SHOP
Route::post('pay-shop', 'PaymentShopController@pay')->name('payment-shop');
Route::get('success-shop/{id}', 'PaymentShopController@success')->name('success-shop');
Route::get('error-shop', 'PaymentShopController@error')->name('error-shop');




Route::get('get-state', 'SolicitudController@getStates');


   /////////////////
  //PRUEBAS BD/////
 /////////////////
// route::get('/', function () {
//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
// route::get('/datos', function () {

//     return DB::connection('oracle')->table(DB::raw("usuario"))->get();
// });
