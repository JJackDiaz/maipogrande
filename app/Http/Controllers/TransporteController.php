<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporte;
use App\TipoTransporte;
use Auth;

class TransporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transportes = Transporte::all();
        $cont = 1;

        return view('transporte.index' ,compact('transportes','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_transporte = TipoTransporte::all();
        return view('transporte.create', compact('tipo_transporte'));
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
            'descripcion' => ['required', 'string'],
            'capacidad_kg' => ['required', 'integer'],
            'capacidad_vol' => ['required', 'integer'],
            'mts_2' => ['required', 'integer'],
            'id_tipo_trans' => ['required', 'integer'],
        ]);


        Transporte::create([
            'descripcion' => $request->descripcion,
            'capacidad_kg' => $request->capacidad_kg,
            'capacidad_vol' => $request->capacidad_vol,
            'mts_2' => $request->mts_2,
            'id_tipo_trans' => $request->id_tipo_trans,
            'usuario_id' => Auth::user()->id,
            
        ]);  
        
        return redirect()->route('transporte.index')->with('success', 'Transporte creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transporte = Transporte::find($id);
        return view('transporte.show',compact('transporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transporte $transporte)
    {
        $tipo_transporte = TipoTransporte::all();
        return view('transporte.edit', compact('transporte','tipo_transporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transporte $transporte)
    {
        $transporte->update($request->all());

        return redirect()->route('transporte.index')->with('success', 'transporte editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transporte $transporte)
    {
        $transporte->delete();

        return redirect()->route('transporte.index')->with('success', 'transporte eliminado');
    }
}
