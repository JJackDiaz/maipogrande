<?php

namespace App\Http\Controllers;
use App\Solicitud;
use App\Producto;
use Auth;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $solicitudes = Solicitud::where("ESTADO_ID",1)->paginate(10);
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.index', compact('cont','solicitudes'));
        }else {
            return view('error.index'); 
        }
    }

    public function create()
    {
        $productos = Producto::all();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.create', compact('productos'));
        }else {
            return view('error.index'); 
        }
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'cantidad' => ['required', 'integer'],
            'producto' => ['required', 'string'],
        ]);



        Solicitud::create([
            'cantidad' => $request->cantidad,
            'producto' => $request->producto,
            'usuario_id' => Auth::user()->id,
            'estado_id' => 1
        ]);  
   
        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'Solicitud creada');
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
        $solicitud = Solicitud::find($id);

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.show',compact('solicitud'));
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
    public function edit(Solicitud $solicitud)
    {
        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.edit', compact('solicitud'));
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
    public function update(Request $request, Solicitud $solicitud)
    {
        
        $solicitud->update($request->all());

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
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

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

    public function activo($id){

        $pendiente = Solicitud::find($id);
        $pendiente->estado_id = 2;
        $pendiente->save();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

    public function anular($id){

        $pendiente = Solicitud::find($id);
        $pendiente->estado_id = 3;
        $pendiente->save();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

}
