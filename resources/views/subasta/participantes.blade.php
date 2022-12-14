@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Subasta Participantes</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Subasta Participantes</span></li>
@endsection
@section('content')
<h1 class="text-center fw-bold text-warning">PARTICIPANTES SUBASTA</h1>
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
    </div>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Transporte</th>
        <th scope="col">Precio</th>
        <th scope="col">Estado</th>
        <th scope="col">Opción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participantes as $participante)
            <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
            <td>{{ $participante->descripcion  }}</td>
            <td>${{ $participante->valor  }}</td>
            <td>{{ $participante->estado }}</td>
                <td>
                    @if($participante->estado == 'N')
                    <a class="btn btn-success" href="{{ route('subasta.seleccion', $participante->id ) }}">
                        <h6 class="text-white">Seleccionar</h6>
                    </a>
                    @elseif($participante->estado == 'Y')
                    <div class="alert alert-success" role="alert">
                        <h6 class="text-primary text-center">Ganador!</h6>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
