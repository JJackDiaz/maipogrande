<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Producto;
use App\TipoProducto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where("usuario_id", Auth::user()->id)->paginate(10);
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

        $categorias = TipoProducto::all();

        return view('producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'cantidad' => ['required', 'integer', 'max:1000'],
            'calidad' => ['required', 'string', 'max:50'],
            'precio' => ['required', 'integer'],
            'fecha_cosecha' => ['required', 'date'],
            'id_tipo_pro' => ['required', 'integer'],
        ]);


        Producto::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'calidad' => $request->calidad,
            'precio' => $request->precio,
            'fecha_cosecha' => $request->fecha_cosecha,
            'precio_unitario' => $request->precio / $request->cantidad,
            'id_tipo_pro' => $request->id_tipo_pro,
            'usuario_id' => Auth::user()->id
        ]); 

        if(Auth::user()->id_tipo_usuario==6){        
            return redirect()->route('producto.index')->with('success', 'Solicitud creada');
        }else {
            return view('error.index'); 
        }
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
