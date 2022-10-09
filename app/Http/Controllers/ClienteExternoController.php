<?php

namespace App\Http\Controllers;
use App\Solicitud;
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

        if(Auth::user()->id_tipo_usuario==3){        
            return view('cliente_externo.business', compact('cont')); 
        }else {
            return view('error.index'); 
        }
    }

    public function create_business(){

        if(Auth::user()->id_tipo_usuario==3){        
            return view('cliente_externo.create_business'); 
        }else {
            return view('error.index'); 
        }
    }
}
