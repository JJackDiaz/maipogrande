<?php

namespace App\Http\Controllers;
use App\Solicitud;
use App\DetalleCliente;
use App\Ciudad;
use Auth;

use Illuminate\Http\Request;

class ClienteExternoController extends Controller
{
    public function solicitud(){

        $solicitudes = Solicitud::all();
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==3){        
            return view('cliente_externo.index', compact('cont','solicitudes')); 
        }else {
            return view('error.index'); 
        }
    }
    public function business(){

        $cont = 1;
        $empresas = DetalleCliente::all();

        if(Auth::user()->id_tipo_usuario==3){        
            return view('cliente_externo.business', compact('cont','empresas')); 
        }else {
            return view('error.index'); 
        }
    }

    public function create_business(){

        $ciudades = Ciudad::join("pais","ciudad.id","=","pais.id")
        ->get();

        if(Auth::user()->id_tipo_usuario==3){        
            return view('cliente_externo.create_business',compact('ciudades')); 
        }else {
            return view('error.index'); 
        }
    }

    public function store_business(Request $request)
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
   
        return redirect()->route('cliente_externo.business')->with('success', 'Empresa creado');
    }
}
