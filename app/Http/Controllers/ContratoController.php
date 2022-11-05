<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Productor;
use DB;
use Auth;
use Carbon;


class ContratoController extends Controller
{

    public function index()
    {
        $contratos = Contrato::all();
        $cont = 1;

        //productor o admin
        if(Auth::user()->id_tipo_usuario==1){        
            return view('contrato.index', compact('contratos','cont'));
        }
        else if(Auth::user()->id_tipo_usuario==6){        
            return view('contrato.contrato', compact('contratos','cont'));
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
        $usuarios = Usuario::where('id_tipo_usuario', 6)->get();

        //productor o admin
        if(Auth::user()->id_tipo_usuario==1){        
            return view('contrato.create', compact('usuarios'));
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
    public function edit(Contrato $contrato)
    {
        //admin
        if(Auth::user()->id_tipo_usuario==1){        
            return view('contrato.edit', compact('contrato'));
        }else {
            return view('error.index'); 
        }
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
            
        $pdf =  Pdf::loadView('contrato.contratoPDF');

        //productor o admin
        if(Auth::user()->id_tipo_usuario==6 || Auth::user()->id_tipo_usuario==1){        
            return $pdf->stream('contrato.pdf');
        }else {
            return view('error.index'); 
        }
    }

    //Productor 
    public function contrato()
    {
        $date = Carbon\Carbon::now();
        $date = $date->format('d-m-Y');

        $usuario_id = Auth::user()->id;
        $contratos = Contrato::where('usuario_id', $usuario_id)->get();
        ///dd($contratos);
        $cont = 1;

        //productor o admin
        if(Auth::user()->id_tipo_usuario==6 || Auth::user()->id_tipo_usuario==1){        
            return view('contrato.contrato', compact('contratos','cont','date'));
        }else {
            return view('error.index'); 
        }
    }

    public function aceptar_contrato($id)
    {
        $now = new \DateTime();
        //Busca el contrato
        $contratos = Contrato::where('id', $id);
        //dd($posts->toSql());

        //Valida si existe el contrato
        if($contratos) {
            
            $contrato = Contrato::where('id', $id)
            ->update(['fecha_firma' => $now->format('Y-m-d'), 'is_active' => 'Y']);

        }else{
            return redirect()->route('contrato.contrato')->with('error', 'Fallo');
        }

        return redirect()->route('contrato.contrato')->with('success', 'Contrato Aceptado');
    }
}
