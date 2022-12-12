<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Usuario;

class GananciaController extends Controller
{
    public function index(){

        $mi_usuario = Usuario::find(Auth::user()->id);

        $externo = DB::table('producto')
        ->join('proceso_producto', 'proceso_producto.producto_id', '=', 'producto.id')
        ->join('venta_ex', 'venta_ex.proceso_producto_id', '=', 'proceso_producto.id')
        ->where('producto.usuario_id', Auth::user()->id)
        ->get();

        $ganancia_externa = 0;
        foreach ($externo as $data) {
            $ganancia_externa += $data->total_venta;
        }

        $local = DB::table('producto')
        ->join('saldo', 'saldo.producto_id', '=', 'producto.id')
        ->join('pedido', 'pedido.saldo_id', '=', 'saldo.id')
        ->join('venta_lo', 'venta_lo.numero_venta', '=', 'pedido.numero_pedido')
        ->where('producto.usuario_id', Auth::user()->id)
        ->get();

        $ganancia_local = 0;
        foreach ($local as $data) {
            $ganancia_local += $data->total_venta;
        }

        $cant_externo = $externo->count();
        $cant_local = $local->count();
        //Proceso venta por productor
        //Pedido por productor

        return view('ganancia.index')->withTitle('Maipo Grande | Shop')->with([
            'mi_usuario' => $mi_usuario,
            'ganancia_externa' => $ganancia_externa,
            'ganancia_local' => $ganancia_local,
            'cant_externo' => $cant_externo,
            'cant_local' => $cant_local
        ]);
    }
}
