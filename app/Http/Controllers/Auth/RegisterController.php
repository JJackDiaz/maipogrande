<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
use App\TipoUsuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_completo' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:usuario'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
    }

    protected function create(array $data)
    {
        $usuario = Usuario::create([
            'nombre_completo' => $data['nombre_completo'],
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_tipo_usuario' => 4,
        ]);   
        
        return $usuario;
    }
}
