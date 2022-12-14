@extends('layouts.template')
@section('title')
    <title>Ver Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Ver Usuario</span></li>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Detalles</h5>
        <p class="card-title">{{ $transporte->descripcion }}</p>
        <h5 class="card-title">Capacidad Kg</h5>
        <p class="card-text">{{ $transporte->capacidad_kg }}</p>
        <h5 class="card-title">Capacidad Volumen</h5>
        <p class="card-text">{{ $transporte->capacidad_vol }}</p>
        <h5 class="card-title">Metros Cuadrados</h5>
        <p class="card-text">{{ $transporte->mts_2 }}</p>
        <h5 class="card-title">Tipo</h5>
        <p class="card-text">{{ $transporte->id_tipo_trans }}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <img class="mx-auto d-block img-responsive" src="{{ asset('images/logos/puesto.png') }}" style=width=340; height=300; ></img>
        <h5 class="text-uppercase text-center">Maipo Grande</h5>
      </div>
    </div>
  </div>
</div>
    
@endsection
