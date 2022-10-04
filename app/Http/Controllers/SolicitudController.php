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
}
