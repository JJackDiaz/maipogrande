@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Subastas</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Subastas Local</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
  @if(Auth::user()->id_tipo_usuario==1)
    <div class="col-12 text-left m-2">
        <a href="{{ route('subasta_local.create') }}" class="btn btn-warning rounded-pill text-white">Crear Subasta Local</a>
      </div>
  @endif
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
          <th scope="col">Dirección</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Tipo subasta</th>
          <th scope="col">Estado</th>
          <th scope="col">N° Proceso Venta</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($subastas as $subasta)
            <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $subasta->direccion }}</td>
                <td>{{ $subasta->fecha_inicio }}</td>
                <td>{{ $subasta->tipo  }}</td>
                <td>{{ $subasta->estado  }}</td>
                <td>{{ $subasta->detalle_pedido_id  }}</td>
                <td>
                  @if(Auth::user()->id_tipo_usuario==5 && $subasta->estado=='activo')
                  <a class="btn btn-success" href="{{ route('subasta.participar-local', $subasta->id ) }}">
                    <h6 class="text-white">Participar</h6>
                  </a>
                  @elseif(Auth::user()->id_tipo_usuario==5 && $subasta->estado=='subastado')
                  <a class="btn btn-danger">
                    <h6 class="text-white">Terminado</h6>
                  </a>
                  @elseif(Auth::user()->id_tipo_usuario==1 && $subasta->estado=='subastado')
                  <a class="btn btn-danger">
                    <h6 class="text-white">Terminado</h6>
                  </a>
                  @elseif(Auth::user()->id_tipo_usuario==1 && $subasta->estado="activo")
                    <form action="destroy" method="POST">
                      @csrf
                      @method('DELETE')
                      <a class="btn btn-warning" href="{{ route('subasta.participantes-local', $subasta->id ) }}">
                        <h6 class="text-white">Participantes</h6>
                      </a>
                      <button type="submit" class="btn btn-danger">
                        <svg class="icon">
                          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                        </svg>
                      </button>
                    </form>
                  @endif
                </td>
            </tr>
          @endforeach
      </tbody>
</table>

@endsection
