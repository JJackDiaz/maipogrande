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
        <a href="{{ route('proceso-venta.create') }}" class="btn btn-warning rounded-pill text-white"> Crear Proceso Venta</a>
      </div>
  @endif
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">Fecha</th>
          <th scope="col">Solicitud</th>
          <th scope="col">Producto</th>
          <th scope="col">Estado</th>
          <th scope="col">Valor</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($procesos as $proceso)
          <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $proceso->fecha }}</td>
              <td>{{ $proceso->id_solicitud }}</td>
              <td>{{ $proceso->producto  }}</td>
              <td>{{ $proceso->estado_id }}</td>
              <td>{{ $proceso->valor }}</td>
              <td>
                <form action="destroy" method="POST">
                  @if(Auth::user()->id_tipo_usuario==1)
                  <a class="btn btn-warning" href="show">
                    <svg class="icon">
                      <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                    </svg></a>
                  </a>
                  <a class="btn btn-success" href="edit">
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
                  @elseif(Auth::user()->id_tipo_usuario==3)
                  <a class="btn btn-success" href="edit">
                    <h6 class="text-white">Pagar</h6>
                  </a>
                  @endif
              </form>
              </td>
          </tr>
          @endforeach
      </tbody>
</table>
@endsection
