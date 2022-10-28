@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Proceso Venta</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Proceso de ventas</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
  @if(Auth::user()->id_tipo_usuario==1)
    <div class="col-12 text-left m-2">
        <a href="{{ route('solicitud.index') }}" class="btn btn-warning rounded-pill text-white">Ver Solicitudes</a>
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
          <th scope="col">Solicitud</th>
          <th scope="col">Estado</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Producto</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($procesos as $proceso)
            <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $proceso->solicitud_proceso_id }}</td>
                <td>{{ $proceso->estado  }}</td>
                <td>{{ $proceso->cantidad  }}</td>
                <td>{{ $proceso->producto  }}</td>
                <td>
                  @if(Auth::user()->id_tipo_usuario==1)
                    <form action="{{ route('proceso-venta.destroy', $proceso->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      @if($proceso->estado == 'activo')
                      <a class="btn btn-success" href="{{ route('proceso-venta.procesamiento', $proceso->id) }}">
                        <svg class="icon">
                          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-check') }}"></use>
                        </svg>
                      </a>
                      @endif
                      <a class="btn btn-warning" href="{{ route('proceso-venta.participantes' , $proceso->id) }}">
                        <h6 class="text-white">Participantes</h6>
                      </a>
                      <button type="submit" class="btn btn-danger">
                        <svg class="icon">
                          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                        </svg>
                      </button>
                    </form>
                  @elseif(Auth::user()->id_tipo_usuario==3)
                      <a class="btn btn-success" href="edit">
                        <h6 class="text-white">Pagar</h6>
                      </a>
                  @elseif (Auth::user()->id_tipo_usuario == 6)
                      <a class="btn btn-success" href="{{ route('proceso-venta.participar', $proceso->id) }}">
                        <h6 class="text-white">Participar</h6>
                      </a>
                      <a class="btn btn-warning" href="{{ route('proceso-venta.participantes' , $proceso->id) }}">
                        <h6 class="text-white">Participantes</h6>
                      </a>
                  @endif
                </td>
            </tr>
          @endforeach
      </tbody>
</table>

@endsection
