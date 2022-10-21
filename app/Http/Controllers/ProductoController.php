<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==6){        
            return view('producto.index', compact('productos','cont'));
        }else {
            return view('error.index'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'nombre','cantidad','calidad','precio','fecha_cosecha','precio_unitario','vida_util'

        $request->validate([
            'nombre' => ['required', 'integer', 'max:255'],
            'cantidad' => ['required', 'string', 'max:255'],
            'calidad' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'string', 'max:255'],
            'fecha_cosecha' => ['required', 'string', 'max:255'],
            'precio_unitario' => ['required', 'string', 'max:255'],
            'vida_util' => ['required', 'string', 'max:255'],
        ]);

        //PROBARRRRRRRRR

        Producto::create([
            'nombre' => $request->cantidad,
            'cantidad' => $request->producto,
            'calidad' => $request->producto,
            'precio' => $request->producto,
            'fecha_cosecha' => $request->producto,
            'precio_unitario' => $request->producto,
            'vida_util' => $request->producto,
            'usuario_id' => Auth::user()->id,
            //Activo 1
            'estado_id' => 1
        ]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
