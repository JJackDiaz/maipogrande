<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\DetalleCliente;
use App\Ciudad;
use Auth;

class DetalleClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cont = 1;
        $empresas = DetalleCliente::all();

        if(Auth::user()->id_tipo_usuario==3){        
            return view('detalle_cliente.index', compact('cont','empresas')); 
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::join("pais","ciudad.id","=","pais.id")
        ->get();

        if(Auth::user()->id_tipo_usuario==3){        
            return view('detalle_cliente.create',compact('ciudades')); 
        }else {
            return view('error.index'); 
        }
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
            'nombre_empresa' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'ciudad_id' => ['required'],
        ]);

        DetalleCliente::create([
            'nombre_empresa' => $request->nombre_empresa,
            'direccion' => $request->direccion,
            'ciudad_id' => $request->ciudad_id,
            'usuario_id' => Auth::user()->id
        ]);  
   
        return redirect()->route('detalle_cliente.index')->with('success', 'Empresa creado');
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
    public function edit(DetalleCliente $detalle_cliente)
    {
        return view('detalle_cliente.edit', compact('detalle_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleCliente $detalle_cliente)
    {
        
        $detalle_cliente->update($request->all());

        return redirect()->route('detalle_cliente.index')->with('success', 'detalle editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleCliente $detalle_cliente)
    {
        $detalle_cliente->delete();

        return redirect()->route('detalle_cliente.index')->with('success', 'Datos editados');
    }
}
