<?php

namespace App\Http\Controllers;
use App\ProcesoVenta;
use App\Usuario;
use App\Producto;
use App\Solicitud;
use App\Estado;
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
        //$procesos = ProcesoVenta::all();
        $cont = 1;

        $procesos = DB::table('proceso_ven')
        ->join('solicitud_pro', 'solicitud_pro.id', '=', 'proceso_ven.id_solicitud')
        ->where('solicitud_pro.estado_id', 2)
        ->get();

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
