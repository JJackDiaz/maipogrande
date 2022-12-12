<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saldo;
use App\Producto;
use App\VentaLo;
use App\DetallePedido;
use App\Pedido;
use DB;
use Auth;
use Cart;

class CartController extends Controller
{

    public function shop()
    {
        $saldos = DB::table('saldo')
        ->where('saldo.estado', 'PUBLICADO')
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

        $saldo = Saldo::where('producto_id', $producto->id)->first();

        $request->validate([
            'id' => 'required',

            'precio' => 'required|numeric',

            'cantidad' => 'required|numeric|min:0.1',

            'nombre' => 'required',


        ]);

        Cart::add(
            $saldo->id,
            $request->nombre,
            $request->precio,
            $request->cantidad,
           
        );
        return back()->with('success',"$saldo->id, ¡se ha agregado con éxito al carrito!");
   
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

        $venta_lo = VentaLo::where('numero_venta',$id)->get();

        return view('checkout', compact('venta_lo'))->with(['cartCollection' => $cartCollection]);
    }

    public function crear_pedido($id){

        $cartCollection = array(\Cart::getContent());

        $existencia = DB::table('pedido')
        ->where('numero_pedido', '=', $id)
        ->get();

        foreach ($cartCollection as $key => $value) {

            foreach ($value as $key) {
                foreach ($key as $aa) {

                    $productos = Producto::where('id',$key['id'])->get();

                    foreach ($productos as $producto) {
                        if ($producto->cantidad > 0) {
                            $producto->cantidad = ($producto->cantidad - $key['quantity']);
                            $producto->save();

                            $saldos = Saldo::where('producto_id',$producto->id)->get();
                
                            foreach ($saldos as $saldo) {
                                if ($saldo->cantidad > 0) {
                                    $saldo->cantidad = $producto->cantidad;
                                    $saldo->descripcion = 'Venta Local';
                                    $saldo->save();
                                }else{
                                    echo 'No quedan productos';
                                }
                            }
                            
                            }else{
                                echo 'No quedan productos';
                            }
                    }


                    if (count($existencia) < 1) {
                        Pedido::create([
                            'numero_pedido' => $id,
                            'precio' => $key['price'],
                            'cantidad' => $key['quantity'],
                            'estado' => 'revisando',
                            'saldo_id' => $key['id'],
                            'usuario_id' => Auth::user()->id,
                        ]);
                        break;
                    }
                }
            }
           
        }

        return view('crear_pedido', compact('id'));
        

    }

    public function store_pedido(Request $request){

        $request->validate([
            'direccion' => ['required', 'string'],
            'comuna' => ['required', 'string'],
            'numero' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);


        DetallePedido::create([
            'numero_pedido' => $request->id,
            'direccion' => $request->direccion,
            'comuna' => $request->comuna,
            'numero' => $request->numero,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'comentario' => $request->comentario,
            'estado' => 'pendiente',
            'usuario_id' => Auth::user()->id
        ]);
      
        return redirect()->route('pedido.index')->with('success', 'Pedido creado');
    }
}

