<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saldo;
use App\Producto;
use DB;
use Cart;

class CartController extends Controller
{
    public function shop()
    {
        $saldos = DB::table('saldo')
        ->join('producto', 'producto.id', '=', 'saldo.id_producto')
        ->get();
        //dd($saldos);
        return view('shop')->withTitle('Maipo Grande | Shop')->with(['saldos' => $saldos]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('Maipo Grande | CART')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request $request){
       
        $producto = Producto::find($request->id_producto);

        $request->validate([
            'id' => 'required',

            'precio' => 'required|numeric',

            'cantidad' => 'required|numeric|min:0.1',

            'nombre' => 'required',


        ]);

        Cart::add(
            $request->id_producto,
            $request->nombre,
            $request->precio,
            $request->cantidad,
           
        );
        return back()->with('success',"$producto->nombre ¡se ha agregado con éxito al carrito!");
   
    }

    public function update( Request $request) {

        if ($request->cantidad >= 1) {
            Cart::update($request->id, array(
                'cantidad' => $request->cantidad,
            ));
            return back()->with('success',"Producto eliminado con éxito de su carrito.");
            
        }else {
            Cart::update($request->id, array(
                'cantidad' => 1,  
            ));

            return back()->with('success',"Producto eliminado con éxito de su carrito.");
        }
        
    }

    public function remove(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}
