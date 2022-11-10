@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Checkout</title>
@endsection
@section('ruta')
  @foreach ( $venta_ex as $venta )
  <li class="breadcrumb-item active"><span>Checkout #{{$venta->numero_venta}}</span></li>
  @endforeach
@endsection
@section('content')
<div class="card text-center">
  <div class="card-header">
    @foreach ( $venta_ex as $venta )
      Nº Venta {{$venta->numero_venta}}
    @endforeach
  </div>
  <div class="container">
    <div class="row align-items-start">
        <div class="col">
          @foreach ($venta_ex as $venta)
            <div class="card-body">
                <h5 class="card-title">Info</h5>
                <p class="card-text">Numero Venta : {{ $venta->numero_venta }}</p>
                <p class="card-text">Detalle : {{ $venta->detalle }}</p>
                <p class="card-text">Estado : {{ $venta->estado_ex }}</p>
                <p class="card-text">ID Proceso : {{ $venta->proceso_producto_id }}</p>
            </div>
        </div>
          <div class="col">
            <div class="card-body">
              <h5 class="card-title">Pagos</h5>
              <p class="card-text">Producto : {{ $venta->valor }}</p>
              <p class="card-text">Comision : {{ $venta->comision }}</p>
              <p class="card-text">Transporte : {{ $venta->servicio }}</p>
              <p class="card-text">Aduana : {{ $venta->aduana }}</p>
              <h5 class="card-title">Total : {{ $venta->total_venta }}</h5>
            </div>
          </div>
          
        </div>
        <form action="{{ route('payment')}}" method="post" class="m-2">
          @csrf
          <input type="hidden" name="amount" value="{{ $venta->total_venta }}">
          <input type="hidden" name="id" value="{{ $venta->id }}">

          <button type="submit" class="btn btn-primary mt-3">Pagar via Paypal</button>
        </form>
      @endforeach
  </div>
  <div class="card-footer text-muted">
    Maipo Grande
  </div>
</div>
@endsection
