<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Usuario;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        $cont = 1;

        return view('contrato.index', compact('contratos','cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::where('id_tipo_usuario', 6)->get();

        return view('contrato.create', compact('usuarios'));
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
            'usuario_id' => ['required', 'string', 'max:255'],
            'porc_comision' => ['required', 'int', 'max:255'],
            'fecha_termino' => ['required', 'date'],
        ]);



        Contrato::create([
            'usuario_id' => $request->usuario_id,
            'porc_comision' => $request->porc_comision,
            'fecha_termino' => $request->fecha_termino,
            'is_active' => 'N',
        ]);  
   
        return redirect()->route('contrato.index')->with('success', 'Contrato creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);
        return view('contrato.show',compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('contrato.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $contrato->update($request->all());

        return redirect()->route('contrato.index')->with('success', 'Contrato editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();

        return redirect()->route('contrato.index')->with('success', 'Contrato editado');
    }

    public function ver_pdf(){
            
        $pdf = \PDF::loadView('contrato.contratoPDF');

        return $pdf->stream('contrato.pdf');
    }
}
