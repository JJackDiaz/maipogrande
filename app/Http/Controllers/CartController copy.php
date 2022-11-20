<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saldo;
use App\Producto;
use App\VentaLo;
use DB;
use Cart;

class CartController extends Controller
{

    public function shop()
    {
        $saldos = DB::table('saldo')
        ->join('producto', 'producto.id', '=', 'saldo.producto_id')
        ->get();
        //dd($saldos);
        return view('shop')->withTitle('Maipo Grande | Shop')->with(['saldos' => $saldos]);
    }

    public function cart(){
        
        $cartCollection = \Cart::getContent();
        return view('cart', ['cartCollection' => $cartCollection]);
    }

    public function add(Request $request){
       
        $producto = Producto::find($request->producto_id);
        
        $request->validate([
            'id' => 'required',

            'precio' => 'required|numeric',

            'cantidad' => 'required|numeric|min:0.1',

            'nombre' => 'required',


        ]);

        Cart::add(
            $request->producto_id,
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
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }


    public function checkout($id){

        $cartCollection = \Cart::getContent();

        $precio = \Cart::getTotal();
        $comision = (5*$precio)/100;
        $servicio = (2*$precio)/100;
        $iva = (19*$precio)/100;

        $total = $comision + $servicio + $iva + $precio;
        
        $existencia = DB::table('venta_lo')
        ->where('numero_venta', '=', $id)
        ->get();

        if (count($existencia) < 1) {

            VentaLo::create([
                'numero_venta' => $id,
                'detalle' => 'Venta local',
                'servicio' => $servicio,
                'comision' => $comision,
                'iva' => $iva,
                'estado_ex' => 'pendiente',
                'total_venta' => $total,
            ]);
            
            foreach ($cartCollection as $item) {
                //id_producto y disminuir
                $productos = Producto::where('id',$item->id)->get();

                foreach ($productos as $key => $producto) {
                    
                    if ($producto->cantidad > 0) {
                    $producto->cantidad = ($producto->cantidad - $item->quantity);
                    $producto->save();
                    }else{
                        echo 'No quedan productos';
                    }

                    //ir a saldo con ese id y disminuir
                    $saldos = Saldo::where('producto_id',$producto->id)->get();

                    dd($saldos);
                
                    foreach ($saldos as $key => $saldo) {
                        if ($saldo->cantidad > 0) {
                            $saldo->cantidad = $saldo->cantidad - $item->quantity;
                            $saldo->descripcion = 'Venta Local';
                            $saldo->save();
                        }else{
                            echo 'No quedan productos';
                        }
                    }
                }
            }
        }
        $venta_lo = VentaLo::where('numero_venta',$id)->get();

        return view('checkout', compact('venta_lo'))->with(['cartCollection' => $cartCollection]);
    }


}

