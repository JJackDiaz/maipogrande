<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Contrato;
use App\Productor;
use DB;

class ProductorController extends Controller
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
        return view('productor.index');
    }

    public function contrato()
    {
        $contratos = Contrato::all();
        $cont = 1;

        return view('productor.contrato', compact('contratos','cont'));
    }

    public function aceptar_contrato($id)
    {
        $now = new \DateTime();

        //$usuario = Contrato::find($id);
        $contrato = Contrato::where('id', $id)
        ->update(['fecha_firma' => $now->format('Y-m-d')]);

        //dd($posts->toSql());
        if($contrato) {
            return redirect()->route('productor.contrato')->with('success', 'Contrato Aceptado');
        }else{
            return redirect()->route('productor.contrato')->with('success', 'Fallo');
        }

        return redirect()->route('productor.contrato')->with('success', 'Contrato Aceptado');
    }
}
