@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Participar Subastas Local</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Participar Subastas local</span></li>
@endsection
@section('content')
<div class="col-6 text-right m-2">Debes crear un transporte para participar
    <a href="{{ route('transporte.create') }}" class="btn btn-warning rounded-pill text-white">Crear Transporte</a>
</div>    
<table class="table table-warning table-striped-columns">
  @if(Session::has('error'))
	  <div>{{Session::get('error')}}</div>
  @endif
  @if(Session::has('success'))
	  <div>{{Session::get('success')}}</div>
  @endif
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Detalles</th>
        <th scope="col">Capacidad Carga</th>
        <th scope="col">Volumen</th>
        <th scope="col">Metro Cuadro</th>
        <th scope="col">N° Tipo Transporte</th>
        <th scope="col">Ingresar Precio</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($transportes as $transporte)
            <tr>
                <th scope="row"><?php echo $cont+1; $cont++; ?></th>
                <td>{{ $transporte->descripcion }}</td>
                <td>{{ $transporte->capacidad_kg }}KG</td>
                <td>{{ $transporte->capacidad_vol  }}</td>
                <td>{{ $transporte->mts_2  }}mts2</td>
                <td>{{ $transporte->id_tipo_trans }}</td>
                <td>
                    <form action="{{ route('subasta.subasta-participar-local', $transporte->id ) }}" method="post">
                        @csrf
                        <input type="number" id="precio" name="precio"  placeholder="$100.000" required>
                        <input type="hidden" id="subasta_tran_id" name="subasta_tran_id" value="{{ $id_subasta }}">
                        <input type="hidden" id="transporte_id" name="transporte_id" value="{{ $transporte->id }}">
                </td>
                <td>
                      {{-- button --}}
                        <button type="submit" class="btn btn-success">
                          <h6 class="text-white">Participar</h6>
                        </button>
                    </form>
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>

@endsection
