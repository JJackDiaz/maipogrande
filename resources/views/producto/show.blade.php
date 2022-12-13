@extends('layouts.template')
@section('title')
    <title>Ver Producto</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Ver Producto</span></li>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Producto</h5>
        <p class="card-title">{{ $producto->nombre }}</p>
        <h5 class="card-title">Cantidad</h5>
        <p class="card-text">{{ $producto->cantidad }}</p>
        <h5 class="card-title">Calidad</h5>
        <p class="card-text">{{ $producto->calidad }}</p>
        <h5 class="card-title">Precio</h5>
        <p class="card-text">{{ $producto->precio }}</p>
        <h5 class="card-title">Fecha Cosecha</h5>
        <p class="card-text">{{ $producto->fecha_cosecha }}</p>
        <h5 class="card-title">Precio Unitario</h5>
        <p class="card-text">{{ $producto->precio_unitario }}</p>     
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <img class="mx-auto d-block img-responsive" src="{{ asset('images/logos/puesto.png') }}" style=width=390px; height=375px; ></img>
        <h5 class="text-uppercase text-center">Maipo Grande</h5>
      </div>
    </div>
  </div>
</div>
    
@endsection
