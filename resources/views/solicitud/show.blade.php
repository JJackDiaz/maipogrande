@extends('layouts.template')
@section('title')
    <title>Ver solicitud</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Ver Solicitud</span></li>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cantidad</h5>
        <p class="card-title">{{ $solicitud->cantidad }}</p>
        <h5 class="card-title">Producto</h5>
        <p class="card-text">{{ $solicitud->producto }}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <img class="mx-auto d-block img-responsive" src="{{ asset('images/logos/puesto.png') }}" style=width=250; height=230; ></img>
        <h5 class="text-uppercase text-center">Maipo Grande</h5>
      </div>
    </div>
  </div>
</div>
    
@endsection
