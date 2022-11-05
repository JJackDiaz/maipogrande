<?php

namespace App\Http\Controllers;
use App\ProcesoVenta;
use App\Usuario;
use App\Producto;
use App\Solicitud;
use App\Estado;
use App\ProcesoProducto;
use App\Saldo;
use App\VentaEx;
use Auth;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProcesoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $procesos = DB::table('proceso_ven')
        ->select('proceso_ven.valor','proceso_ven.id','proceso_ven.solicitud_proceso_id','proceso_ven.estado','solicitud_pro.cantidad','solicitud_pro.producto')
        ->join('solicitud_pro', 'solicitud_pro.id', '=', 'proceso_ven.solicitud_proceso_id')
        ->get();



        
        $cont = 1;

        return view('proceso_venta.index', compact('procesos', 'cont'));
    }
    
    public function checkout_proceso($id)
    {

        $venta_ex = VentaEx::where('proceso_ven_id', '=', $id)
        ->join('proceso_producto', 'proceso_producto.id', '=', 'venta_ex.proceso_producto_id')
        ->where('proceso_producto.estado', 'Y')
        ->get();

        return view('proceso_venta.checkout', compact('venta_ex'));
    }

    public function destroy(ProcesoVenta $proceso_ventum)
    {
        $proceso_ventum->delete();
      
        return redirect()->route('proceso-venta.index')->with('success', 'Porceso Eliminado');
    }

    public function crear_proceso_venta($id){

        $existencia = DB::table('proceso_ven')
        ->where('solicitud_proceso_id', '=', $id)
        ->get();

        if (count($existencia) < 1) {
            ProcesoVenta::create([
                'estado' => 'activo',
                'solicitud_proceso_id' => $id,
            ]);
            
            return redirect()->route('proceso-venta.index')->with('success', 'Proceso creada');
        }

        
        return redirect()->route('proceso-venta.index')->with('error', 'Proceso existente');
    }

    public function participar(Request $request){

        $solicitud = $request->id;

        $productos = Producto::where("usuario_id", Auth::user()->id)->get();
        $cont = 1;

        return view('proceso_venta.participar', compact('productos','cont','solicitud'));
    }

    public function participar_proceso($id ,Request $request){

        $existencia = DB::table('proceso_producto')
        ->where('producto_id', '=', $id)
        ->get();

        if (count($existencia) < 1) {
            $proceso = ProcesoProducto::create([
                'estado' => 'N',
                'proceso_ven_id' => $request->input('solicitud'),
                'producto_id' => $id,
            ]);

            if ($proceso) {
                $producto = Producto::find($id);
                $producto->codigo = $request->input('solicitud');
                $producto->save();
            }

            return redirect()->route('proceso-venta.index')->with('success', 'Participando');
        }
    
        return redirect()->route('proceso-venta.index')->with('error', 'Ya estas participando');
    
    }
    public function participantes($id){

        $participantes = ProcesoProducto::where('proceso_ven_id', $id)->get();
        $cont = 1;
    
        return view('proceso_venta.participantes', compact('participantes','cont'));
    }

    public function procesamiento($id){
        
        $productos = Producto::where('codigo', $id)
        ->get();

        $min = $productos->min('precio');
        
        foreach ($productos as $key => $value) {

            
            $array = ['id' => $value->id , 'precio' => $value->precio];
            
            if ($array['precio'] == $min) {
                
                $id_producto = $array['id'];
                $productos = Producto::find($id_producto);
                
                //proceso producto LISTO
                $proceso_producto = ProcesoProducto::where('producto_id', $id_producto)->first();
                $proceso_producto->estado = 'Y';
                $proceso_producto->save();

                //proceso venta LISTO
                $proceso = ProcesoVenta::where('id', $id)->first();
                $proceso->estado = 'terminado';
                $solicitud_id = $proceso->solicitud_proceso_id;
                

                $solicitud = Solicitud::where('id', $solicitud_id)->first();
                $solicitud->estado_id = 4;
                
                if ($solicitud->save()) {
                    //cantidad solicitud
                    $cantidad_solicitud = $solicitud->cantidad;
                    //cantidad productos
                    $cantidad_producto = $productos->cantidad;

                    //Disminuye la cantidad en productos
                    $productos->cantidad = ($cantidad_producto - $cantidad_solicitud);

                    //precio unitario
                    $precio_producto = $productos->precio_unitario;

                    //disminuye el precio del producto
                    $productos->precio = ($productos->cantidad * $precio_producto);

                    $precio_total_proceso = $cantidad_solicitud * $precio_producto;

                    $proceso_producto->valor = $precio_total_proceso;
                    $proceso->valor = $precio_total_proceso;
                    $proceso->save();
                    $proceso_producto->save();
                    $productos->save();

                    if ($productos->save()) {
                        //precio del proceso
                        
                        Saldo::create([
                            'cantidad' => $productos->cantidad,
                            'precio' => $productos->precio,
                            'id_producto' => $productos->id,
                            'estado' => 'pendiente',
                        ]);

                        $precio = $precio_total_proceso;
                        $comision = (10*$precio_total_proceso)/100;
                        $servicio = (5*$precio_total_proceso)/100;
                        $aduana = (25*$precio_total_proceso)/100;

                        $total = $comision + $servicio + $aduana + $precio;
                        
                        VentaEx::create([
                            'numero_venta' => rand(2,50),
                            'detalle' => 'Venta al extranjero',
                            'comision' => $comision,
                            'servicio' => $servicio,
                            'aduana' => $aduana,
                            'total_venta' => $total,
                            'estado_ex' => 'pendiente',
                            'proceso_producto_id' => $id,
                        ]);

                        
                    }

                    //ARREGAR DESPUES SOLO PUEDE EL ADMIN
            
                    return redirect()->route('proceso-venta.index')->with('success', 'Proceso creada');

                    
                }

            }

        }
        
    }


}
