<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginVerify(Request $request)
    {

        $response = Http::post('http://localhost/apirest_mGrande/auth', [
            'email' => $request->email,
            'contrasena' => md5($request->contrasena)
        ]);

        dd($response->getBody()->getContents());
        exit;

        if ($response) {
            $response->successful();
            return redirect()->route('productor');
        }else{
            return view('auth.login')->withErrors(['invalid_credencials' => 'API NULL']);
        }

        
        return back()->withErrors(['invalid_credencials' => 'Email o contraseña invalida'])->withInput();
    }

}
