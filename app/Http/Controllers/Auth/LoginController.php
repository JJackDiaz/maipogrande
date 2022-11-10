<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //REDIRIGIR SEGUN TIPO USUARIO
    public function authenticated($request , $user){
        //ADMIN
        if($user->id_tipo_usuario==1){
            return redirect()->route('home') ;
        }
        //PRODUCTOR
        if($user->id_tipo_usuario==6){
            return redirect()->route('producto.index') ;
        }
        //EXTERNO
        if($user->id_tipo_usuario==3){
            return redirect()->route('solicitud.index') ;
        }

        //TRANSPORTISTA
        if($user->id_tipo_usuario==5){
            return redirect()->route('transporte.index');
        }
        
        //local
        if($user->id_tipo_usuario==4){
            return redirect()->route('shop') ;
        }

    }
}
