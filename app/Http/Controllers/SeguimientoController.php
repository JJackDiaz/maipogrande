<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\ProcesoVenta;

class SeguimientoController extends Controller
{
    public function seguimiento(Request $request){

        $externo = $request->numero_solictud;
        $local = $request->numero_pedido;

        if (isset($local)) {
            
            $pedido = Pedido::where('numero_pedido', $local)->get();

            if (count($pedido) == 1) {
                foreach ($pedido as $value) {
                    if (isset($value->numero_pedido)) {
                        $numero = $value->numero_pedido;
                        return view('seguimiento.seguimiento', compact('pedido', 'numero'));
                    }
                }
            }else {
                return redirect()->route('seguimiento')->with('error', 'No existe pedido!!!');
            }
        return view('seguimiento.seguimiento');

        }
        if(isset($externo)){

            $proceso_venta = ProcesoVenta::where('solicitud_proceso_id', $externo)->get();

            if (count($proceso_venta) == 1) {
                foreach ($proceso_venta as $value) {
                    if (isset($value->solicitud_proceso_id)) {
                        $number = $value->solicitud_proceso_id;
                        return view('seguimiento.seguimiento', compact('proceso_venta', 'number'));
                    }
                }
            }else {
                return redirect()->route('seguimiento')->with('error', 'No existe pedido!!!');
            }
        }

        return view('seguimiento.seguimiento');
    }
}
