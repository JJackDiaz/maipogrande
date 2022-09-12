<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    public function index(){
        return view('transportista.index');
    }
}
