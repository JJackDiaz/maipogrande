@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Participar Proceso</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Participar en Proceso</span></li>
@endsection
@section('content')
<h6>Selecciona producto que se asocie al proceso de venta</h6>
<table class="table table-warning table-striped-columns">
    @if(Auth::user()->id_tipo_usuario==1)
      <div class="col-12 text-left m-2">
          <a href="{{ route('solicitud.index') }}" class="btn btn-warning rounded-pill text-white">Ver Solicitudes</a>
        </div>
    @endif
    @if(Session::has('error'))
        <div>{{Session::get('error')}}</div>
    @endif
      <div class="col-12 text-left m-2">
      </div>
        <thead>
          <tr>
          <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Cantidad Solicitud</th>
            <th scope="col">Calidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
              <tr>
                <th scope="row"><?php echo $cont; $cont++; ?></th>
                  <td>{{ $producto->nombre }}</td>
                  <td>{{ $producto->cantidad }}KG</td>
                  <td>{{ $cantidad }}KG</td>
                  <td>{{ $producto->calidad }}</td>
                  <td>${{ $producto->precio }}</td>
                  <td>
                    <form action="{{ route('proceso-venta.participar_proceso',$producto->id) }}" method="get">
                        <input type="text" value="{{ $solicitud }}" hidden name="solicitud">
                        @if ($cantidad <= $producto->cantidad && $producto->cantidad > 0)
                          <button type="submit" class="btn btn-danger">
                            <h6 class="text-white">Seleccionar</h6>
                          </button>
                        @else
                          <div class="alert alert-primary" role="alert">
                            Insuficiente cantidad!
                          </div>
                        @endif
                        
                    </form>
                  </td>
              </tr>
            @endforeach
        </tbody>
  </table>
@endsection
