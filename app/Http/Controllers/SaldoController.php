<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saldo;
use DB;

class SaldoController extends Controller
{
    public function index(){

        $saldos = DB::table('saldo')
        ->join('producto', 'producto.id', '=', 'saldo.producto_id')
        ->get();

        $cont = 1;

        $count = Saldo::where('estado', 'pendiente')->count();

        return view('saldo.index', compact('cont','saldos','count'));
    }
}
