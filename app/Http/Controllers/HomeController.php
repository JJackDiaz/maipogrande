<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         //Cantidad usuarios
        $count = DB::table('usuario')->count();

         //Venta Local
        $total_venta_local = DB::table('venta_lo')->get();
        $sum = 0;
        foreach ($total_venta_local as $object) {
    
            $sum += $object->total_venta;
        }
        //Venta Externa
        $total_venta_externo = DB::table('venta_ex')->get();

        $sum_externo = 0;

        foreach ($total_venta_externo as $object) {
    
            $sum_externo += $object->total_venta;
        }

        //Cantidad procesos de ventas
        $count_pv = DB::table('proceso_ven')->count();

        //cantidad pedidos
        $count_pedido = DB::table('pedido')->count();

        return view('home', compact('count','sum','sum_externo','count_pv','count_pedido'));
    }
}
