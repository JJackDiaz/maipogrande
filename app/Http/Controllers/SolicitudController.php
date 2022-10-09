<?php

namespace App\Http\Controllers;
use App\Solicitud;

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
            'nombre_completo' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'id_tipo_usuario' => ['required'],
        ]);



        Usuario::create([
            'nombre_completo' => $request->nombre_completo,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_tipo_usuario' => $request->id_tipo_usuario,
        ]);  
   
        return redirect()->route('usuario.index')->with('success', 'Usuario creado');
    }
}
