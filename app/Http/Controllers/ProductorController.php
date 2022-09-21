<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Contrato;
use App\Productor;
use DB;
use Auth;
use Carbon;


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
        $date = Carbon\Carbon::now();
        $date = $date->format('d-m-Y');

        $usuario_id = Auth::user()->id;
        $contratos = Contrato::where('usuario_id', $usuario_id)->get();
        ///dd($contratos);
        $cont = 1;

        return view('productor.contrato', compact('contratos','cont','date'));
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
            return redirect()->route('productor.contrato')->with('error', 'Fallo');
        }

        return redirect()->route('productor.contrato')->with('success', 'Contrato Aceptado');
    }
}
