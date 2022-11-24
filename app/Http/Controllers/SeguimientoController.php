<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class SeguimientoController extends Controller
{
    public function seguimiento(Request $request){

        $externo = $request->numero_seguimiento;
        $local = $request->numero_pedido;

        if ($local) {
            
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

        }else {

            return view('seguimiento.seguimiento');
        }
    
    }
}
