<?php

namespace App\Http\Controllers;
use App\Solicitud;
use App\Pais;
use App\Ciudad;
use App\Producto;
use Auth;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    public $token;
    public $paises;
    public $ciudades;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if (Auth::user()->id_tipo_usuario==1) {
            $solicitudes = Solicitud::paginate(10);
        }elseif (Auth::user()->id_tipo_usuario==3) {
            $solicitudes = Solicitud::where("usuario_id",Auth::user()->id)->paginate(10);
        }
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.index', compact('cont','solicitudes'));
        }else {
            return view('error.index'); 
        }
    }

    public function create()
    {
        $productos = Producto::all();
        $paises = Pais::all();
        $ciudades = Ciudad::all();

        // //API PAISES
        // $response = Http::withHeaders([
        //     "Accept" => "application/json",
        //     "api-token" => "kNs7CAA720ZI85yknY7rSuDF_FQ1FtfuQZpDHHVA7waerr6l1Mc4DZV7YT1bqD209d8",
        //     "user-email" => "jjackdiaz.10@gmail.com"
        // ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

        // $array = (array)$response->json(["auth_token"]);

        // foreach ($array as $key => $value) {
        //     $this->token = $value;
        // }

        // $pais = Http::withHeaders([
        //     "Authorization" => 'Bearer '. $this->token,
        //     "Accept" => "application/json"
        // ])->get('https://www.universal-tutorial.com/api/countries/');

        // $paises = $pais->json();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.create', compact('productos','paises','ciudades'));
        }else {
            return view('error.index'); 
        }
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'cantidad' => ['required', 'integer'],
            'producto' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'pais_id' => ['required', 'integer'],
            'ciudad_id' => ['required', 'integer'],
        ]);


        Solicitud::create([
            'cantidad' => $request->cantidad,
            'producto' => $request->producto,
            'direccion' => $request->direccion,
            'pais_id' => $request->pais_id,
            'usuario_id' => Auth::user()->id,
            'ciudad_id' => $request->ciudad_id,
            'estado_id' => 1
        ]);  
   
        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'Solicitud creada');
        }else {
            return view('error.index'); 
        }
    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.show',compact('solicitud'));
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return view('solicitud.edit', compact('solicitud'));
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        
        $solicitud->update($request->all());

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

    public function activo($id){

        $pendiente = Solicitud::find($id);
        $pendiente->estado_id = 2;
        $pendiente->save();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

    public function anular($id){

        $pendiente = Solicitud::find($id);
        $pendiente->estado_id = 3;
        $pendiente->save();

        if(Auth::user()->id_tipo_usuario==3 || Auth::user()->id_tipo_usuario==1){        
            return redirect()->route('solicitud.index')->with('success', 'solicitud editado');
        }else {
            return view('error.index'); 
        }
    }

}
