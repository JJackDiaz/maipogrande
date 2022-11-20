<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Subasta;
use App\SubastaLocal;
use App\Transporte;
use App\DetallePedido;
use App\Pedido;
use App\VentaLo;
use Carbon\Carbon;
use App\Mail\AlertaMailable;
use Mail;
use DB;

class SubastalocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subastas = Subasta::whereNull('proceso_producto_id')->get();
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==5 || Auth::user()->id_tipo_usuario==1){        
            return view('subasta_local.index', compact('cont','subastas'));
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
        return view('subasta.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function crear_subasta_local($id)
    {

        $detalle_pedido = DB::table('detalle_pedido')
        ->where('detalle_pedido.numero_pedido', '=', $id)
        ->get();

        foreach ($detalle_pedido as $key) {
            $pedido_id = $key->id;
            $direccion = $key->direccion;
        }

        $existencia = DB::table('subasta_trans')
        ->where('detalle_pedido_id', '=', $pedido_id)
        ->get();

        if (count($existencia) < 1) {

        Subasta::create([
            'direccion' => $direccion,
            'estado' => 'activo',
            'fecha_inicio' => Carbon::now(),
            'tipo' => 'venta externa',
            'detalle_pedido_id' => $pedido_id,
        ]);

        return redirect()->route('subasta_local.index')->with('success', 'Suabsta Creada');

        }


        return redirect()->route('subasta_local.index')->with('error', 'Subasta existente');
    }

    public function subasta_participantes_local($id){

        $participantes = SubastaLocal::where('subasta_trans_id', $id)->get();
        $cont = 1;

        return view('subasta_local.participantes', compact('participantes','cont'));

    }

    public function participar_local($id){

        $transportes = Transporte::where("usuario_id", Auth::user()->id)->get();
        $cont = 1;
        $id_subasta = $id;

        return view('subasta_local.participar_local', compact('transportes','cont','id_subasta'));

    }

    public function subasta_participar_local($id, Request $request){

            $subasta_externo = SubastaLocal::create([
                'valor' => $request->input('precio'),
                'estado' => 'N', 
                'subasta_trans_id' => $request->input('subasta_tran_id'),
                'transporte_id' => $request->input('transporte_id'),
            ]);

        return redirect()->route('subasta_local.index')->with('success', 'Participando');
        
    }

    //falta
    public function seleccion_subasta_local($id){

        //trae id de subasta externo
        $subastaLocal = SubastaLocal::find($id);
        $subasta = Subasta::find($subastaLocal->subasta_trans_id);
        $detalle_pedido = DetallePedido::find($subasta->detalle_pedido_id);

        $subastaLocal->estado = 'Y';
        //$subastaExterno->save();
        $subasta->estado = 'subastado';
        //$subasta->save();
        $detalle_pedido->estado = 'subastado';
        
        $pedido = Pedido::where('numero_pedido', $detalle_pedido->numero_pedido)->get();
        
        $precio = 0;
        foreach ($pedido as $value) {
            
            $value->estado = 'subastado';
            $value->save();
            $precio += $value->precio;
            $numero_venta = $value->numero_venta;
            
        }

        $precio = $precio;
        $comision = (10*$precio)/100;
        $servicio = ((2*$precio)/100)+$subastaLocal->valor;
        $iva = (19*$precio)/100;

        $total = $comision + $servicio + $iva + $precio;

        if ($subastaLocal->save() && $subasta->save() && $detalle_pedido->save()) {
            # code...
            VentaLo::create([
                'numero_venta' => $detalle_pedido->numero_pedido,
                'detalle' => 'Venta Nacional',
                'comision' => $comision,
                'servicio' => $servicio,
                'iva' => $iva,
                'total_venta' => $total,
                'estado_lo' => 'pendiente',
            ]);

            $correo = new AlertaMailable;
            Mail::to($detalle_pedido->email)->send($correo);

        }
        return redirect()->route('subasta_local.index')->with('success', 'Subasta Terminada');

    }

}
