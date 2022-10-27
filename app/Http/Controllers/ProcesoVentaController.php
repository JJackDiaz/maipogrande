<?php

namespace App\Http\Controllers;
use App\ProcesoVenta;
use App\Usuario;
use App\Producto;
use App\Solicitud;
use App\Estado;
use App\ProcesoProducto;
use Auth;
use DB;

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
        ->select('proceso_ven.id','proceso_ven.solicitud_proceso_id','proceso_ven.estado','solicitud_pro.cantidad','solicitud_pro.producto')
        ->join('solicitud_pro', 'solicitud_pro.id', '=', 'proceso_ven.solicitud_proceso_id')
        ->get();

        $cont = 1;

        return view('proceso_venta.index', compact('procesos', 'cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$usuarios = Usuario::all();
        $productos = Producto::all();
        $solicitudes = Solicitud::all();

        return view('proceso_venta.create', compact('productos','solicitudes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => ['required', 'date'],
            'id_solicitud' => ['required', 'integer'],
            'producto_id' => ['required', 'string'],
        ]);

        $solicitud = Solicitud::find($request->id_solicitud);
        $producto = Producto::find($request->producto_id);

        $valor = $producto->precio_unitario * $solicitud->cantidad;

        $proceso = ProcesoVenta::create([
            'fecha' => $request->fecha,
            'id_solicitud' => $request->id_solicitud,
            'producto_id' => $request->producto_id,
            'estado_id' => 2,
            'valor' => $valor,
        ]);

        if ($proceso) {
            $solicitud->estado_id = 2;

            if($solicitud->save()){

                $cantidad_solicitud = $solicitud->cantidad;
                $cantidad_producto = $producto->cantidad;

                $producto->cantidad = ($cantidad_producto - $cantidad_solicitud);

                $cantidad_solicitud = $solicitud->cantidad;
                $precio_producto = $producto->precio_unitario;

                $producto->precio = ($cantidad_solicitud * $precio_producto);

                $producto->save();
            }
        }

        //ARREGAR DESPUES SOLO PUEDE EL ADMIN
        if(Auth::user()->id_tipo_usuario==1 || Auth::user()->id_tipo_usuario==6){        
            return redirect()->route('proceso-venta.index')->with('success', 'Proceso creada');
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                $producto->codigo = $request->input('solicitud').'P';
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
        
        $participantes = DB::table('proceso_producto')
        ->select(
        'solicitud_pro.cantidad as cant_soli',
        )
        ->join('producto', 'producto.id', '=', 'proceso_producto.producto_id')
        ->join('proceso_ven', 'proceso_ven.id', '=', 'proceso_producto.proceso_ven_id')
        ->join('solicitud_pro', 'solicitud_pro.id', '=', 'proceso_ven.solicitud_proceso_id')
        ->where('proceso_ven_id', $id)
        ->get();
        
        $productos = Producto::where('codigo', $id)
        ->get();

        
        $min = $productos->min('precio');
        
        foreach ($productos as $key => $value) {
            
            $array = ['id' => $value->id , 'precio' => $value->precio];

            if ($array['precio'] == $min) {

                $id_producto = $array['id'];
                $productos = Producto::find($id_producto);
                

                //SOLUCION LISTA EDITAR VALORES
            }

            $part = ProcesoProducto::where('producto_id', $id_producto);

            var_dump($part);



        }
        
    }


}
