<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Subasta;
use App\Solicitud;
use App\SubastaExterno;
use App\Transporte;
use App\ProcesoProducto;
use App\ProcesoVenta;
use App\VentaEx;
use App\Usuario;
use Carbon\Carbon; 
use DB;
use Mail;
use App\Mail\AlertaTransportista;

class SubastaExternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subastas = Subasta::whereNull('detalle_pedido_id')->get();
        $cont = 1;

        if(Auth::user()->id_tipo_usuario==5 || Auth::user()->id_tipo_usuario==1){        
            return view('subasta.index', compact('cont','subastas'));
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

    public function crear_subasta($id)
    {

        $solicitud = DB::table('proceso_ven')
        ->select('direccion' ,'proceso_ven.id')
        ->where('proceso_ven.solicitud_proceso_id', '=', $id)
        ->join('solicitud_pro', 'solicitud_pro.id', '=', 'proceso_ven.solicitud_proceso_id')
        ->get();

        foreach ($solicitud as $key) {
            $direccion = $key->direccion;
            $proceso_ven = $key->id;
        }
        
        $proceso_producto = DB::table('proceso_producto')
        ->where('proceso_producto.proceso_ven_id', '=', $proceso_ven)->get();

        foreach ($proceso_producto as $key) {
            $id_proceso_producto = $key->id;
        }
        
        Subasta::create([
            'fecha_inicio' => Carbon::now(),
            'tipo' => 'venta externa',
            'estado' => 'activo',
            'direccion' => $direccion,
            'proceso_producto_id' => $id_proceso_producto,
        ]);


        return redirect()->route('subasta.index')->with('success', 'Subasta creada');
    }

    public function subasta_participantes($id){

        $participantes = SubastaExterno::where('subasta_trans_id', $id)
        ->join('transporte', 'transporte.id', '=', 'subasta_transporte_externo.transporte_id')
        ->get();
        $cont = 1;

        return view('subasta.participantes', compact('participantes','cont'));

    }

    public function participar($id){

        $transportes = Transporte::where("usuario_id", Auth::user()->id)->get();
        $cont = 0;
        $id_subasta = $id;

        return view('subasta.participar', compact('transportes','cont','id_subasta'));

    }

    public function subasta_participar($id, Request $request){

        // $existencia = DB::table('subasta_transporte_externo')
        // ->where('transporte_id', '=', $id)
        // ->get();

        // if (count($existencia) < 1) {
            $subasta_externo = SubastaExterno::create([
                'valor' => $request->input('precio'),
                'estado' => 'N', 
                'subasta_trans_id' => $request->input('subasta_tran_id'),
                'transporte_id' => $request->input('transporte_id'),
            ]);

            return redirect()->route('subasta.index')->with('success', 'Participando');
        // }
    
        // return redirect()->route('subasta.index')->with('error', 'Ya estas participando');
    }

    public function seleccion_subasta($id){

        //trae id de subasta externo
        $subastaExterno = SubastaExterno::find($id);
        $subasta = Subasta::find($subastaExterno->subasta_trans_id);
        $proceso = ProcesoProducto::find($subasta->proceso_producto_id);
        $proceso_venta = ProcesoVenta::find($proceso->proceso_ven_id);

        //Datos envio para correo
        $solicitud = Solicitud::find($proceso_venta->solicitud_proceso_id);
        $numero_soli = $solicitud->id;
        $direccion = $solicitud->direccion;
        $ciudad = $solicitud->ciudad;
        $pais = $solicitud->pais->nombre;
        //Datos cliente 
        $cliente = Usuario::find($solicitud->usuario_id);
        $nombre = $cliente->nombre_completo;
        $email = $cliente->email;
        $telefono = $cliente->telefono;

        $subastaExterno->estado = 'Y';
        //$subastaExterno->save();

        $subasta->estado = 'subastado';
        //$subasta->save();

        $proceso_venta->estado = 'subastado';
        $proceso->valor = $proceso->valor + $subastaExterno->valor;
        //$proceso->save();

        $precio = $proceso->valor;
        $comision = (10*$precio)/100;
        $servicio = ((2*$precio)/100)+$subastaExterno->valor;
        $aduana = (25*$precio)/100;

        $total = $comision + $servicio + $aduana + $precio;

        if ($subastaExterno->save() && $subasta->save() && $proceso->save() && $proceso_venta->save()) {

            //correo subasta
            $correo = new AlertaTransportista($numero_soli,$direccion,$ciudad,$pais,$nombre,$email,$telefono);
            Mail::to('jjackdiaz.10@gmail.com')->send($correo);

            VentaEx::create([
                'numero_venta' => rand(2,50),
                'detalle' => 'Venta al extranjero',
                'comision' => $comision,
                'servicio' => $servicio,
                'aduana' => $aduana,
                'total_venta' => $total,
                'estado_ex' => 'pendiente',
                'proceso_producto_id' => $proceso->id,
            ]);
        }
        return redirect()->route('subasta.index')->with('success', 'Subasta Terminada');

    }

}
