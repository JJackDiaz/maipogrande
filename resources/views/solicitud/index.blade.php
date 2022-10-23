@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Solicitud</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Solicitud</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
    @if (Auth::user()->id_tipo_usuario == 3)
      <div class="col-12 text-left m-2">
        <a href="{{ route('solicitud.create') }}" class="btn btn-warning rounded-pill text-white"> Crear Solicitud</a>
      </div>
    @endif
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Producto</th>
          <th scope="col">Estado</th>
          @if (Auth::user()->id_tipo_usuario == 1)
            <th scope="col">Cliente</th>
          @endif
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($solicitudes as $solicitud)
          <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $solicitud->cantidad }}</td>
              <td>{{ $solicitud->producto }}</td>
              <td>{{ $solicitud->estado->estado}}</td>
              @if (Auth::user()->id_tipo_usuario == 1)
                <td>{{ $solicitud->usuario_id }}</td>
              @endif
              <td>
              @if (Auth::user()->id_tipo_usuario == 3)
                <form action="{{ route('solicitud.destroy',$solicitud->id) }}" method="POST">
                  
                  <a class="btn btn-warning" href="{{ route('solicitud.show',$solicitud->id) }}">
                    <svg class="icon">
                      <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                    </svg></a>
                  </a>
                  
                  <a class="btn btn-success" href="{{ route('solicitud.edit',$solicitud->id) }}">
                    <svg class="icon">
                      <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                    </svg></a>
                  </a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">
                    <svg class="icon">
                      <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                    </svg></a>
                  </button>
              </form>
              @else
              <form action="{{ route('solicitud.estado_pendiente',$solicitud->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                  <svg class="icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-check') }}"></use>
                  </svg></a>
                </button>
                <a class="btn btn-danger" href="{{ route('solicitud.anular',$solicitud->id) }}">
                  <svg class="icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-x') }}"></use>
                  </svg></a>
                </a>
              </form>
              @endif
              </td>
          </tr>
          @endforeach
      </tbody>
</table>
@endsection
