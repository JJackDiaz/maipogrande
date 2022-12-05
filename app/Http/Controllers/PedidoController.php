<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->id_tipo_usuario==1) {
            $pedidos = Pedido::paginate(10);
        }elseif (Auth::user()->id_tipo_usuario==4) {
            $pedidos = Pedido::where("usuario_id",Auth::user()->id)->paginate(10);
        }
        
        $cont = 1;

        return view('pedido.index', compact('pedidos','cont'));
    }

    public function estado_recibido($id){

        $pedido = Pedido::find($id);
        $pedido->estado = 'recibido';
        $pedido->save();

        return redirect()->route('pedido.index')->with('success', 'recibido');
        
    }
}
