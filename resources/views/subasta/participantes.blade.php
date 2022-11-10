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
        <th scope="col">Estado</th>
        <th scope="col">Transporte</th>
        <th scope="col">Valor</th>
        <th scope="col">Opción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participantes as $participante)
            <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $participante->estado }}</td>
                <td>{{ $participante->transporte_id  }}</td>
                <td>${{ $participante->valor  }}</td>
                <td>
                    {{-- buton --}}
                    <a class="btn btn-success" href="{{ route('subasta.seleccion', $participante->id ) }}">
                        <h6 class="text-white">Seleccionar</h6>
                      </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
