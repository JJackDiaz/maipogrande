@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Participantes</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Participantes</span></li>
@endsection
@section('content')
<h1 class="text-center fw-bold text-warning">PARTICIPANTES</h1>
@php
    foreach ($participantes as $key) {
        $part = $key->proceso_ven_id;
        $pro = $key->producto->id;
    }
@endphp
@if(Auth::user()->id_tipo_usuario==1)
    <div class="col-12 text-left m-2">
        <a href="{{ url('procesamiento', $part) }}" class="btn btn-warning rounded-pill text-white">Terminar Proceso</a>
      </div>
@endif
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
    </div>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Usuario</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participantes as $participante)
            <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $participante->producto->usuario_id }}</td>
                <td>{{ $participante->producto->nombre  }}</td>
                <td>{{ $participante->producto->cantidad  }}</td>
                <td>{{ $participante->producto->precio  }}</td>
                <td>{{ $participante->estado  }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
