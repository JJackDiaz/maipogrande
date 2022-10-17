<?php

namespace App\Http\Controllers;
use App\Solicitud;
use Auth;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $solicitudes = Solicitud::all();
        $cont = 1;
        return view('solicitud.index', compact('cont','solicitudes')); 
    }

    public function create()
    {
        return view('solicitud.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'cantidad' => ['required', 'integer', 'max:255'],
            'producto' => ['required', 'string', 'max:255'],
        ]);



        Solicitud::create([
            'cantidad' => $request->cantidad,
            'producto' => $request->producto,
            'usuario_id' => Auth::user()->id,
            //Activo 1
            'estado_id' => 1
        ]);  
   
        return redirect()->route('cliente_externo.solicitud')->with('success', 'Solicitud creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicitud.show',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        return view('solicitud.edit', compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        
        $solicitud->update($request->all());

        return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
    }
}
