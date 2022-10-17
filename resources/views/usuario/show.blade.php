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
        <h5 class="card-title">Nombre Completo</h5>
        <p class="card-title">{{ $usuario->nombre_completo }}</p>
        <h5 class="card-title">Email</h5>
        <p class="card-text">{{ $usuario->email }}</p>
        <h5 class="card-title">Telefono</h5>
        <p class="card-text">{{ $usuario->telefono }}</p>
        <h5 class="card-title">Tipo Usuario</h5>
        @if($usuario->id_tipo_usuario == 1)
          <p class="card-text">Administrador</p>
        @elseif($usuario->id_tipo_usuario == 2)
          <p class="card-text">Consultor</p>
        @elseif($usuario->id_tipo_usuario == 3)
          <p class="card-text">Externo</p>
        @elseif($usuario->id_tipo_usuario == 4)
          <p class="card-text">Interno</p>
        @elseif($usuario->id_tipo_usuario == 5)
          <p class="card-text">Transportista</p>
        @elseif($usuario->id_tipo_usuario == 6)
          <p class="card-text">Productor</p>
        <!-- If con todos los usuario -->
        @endif
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
