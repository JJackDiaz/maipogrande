@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Transporte</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Subastas</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
  @if(Auth::user()->id_tipo_usuario==5)
    <div class="col-12 text-left m-2">
        <a href="create" class="btn btn-warning rounded-pill text-white">Crear Transporte</a>
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
          <th scope="col">Detalles</th>
          <th scope="col">Capacidad Carga</th>
          <th scope="col">Volumen</th>
          <th scope="col">Metro Cuadro</th>
          <th scope="col">N° Tipo Transporte</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($transportes as $transporte)
            <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $transporte->descripcion }}</td>
                <td>{{ $transporte->capacidad_kg  }}</td>
                <td>{{ $transporte->capacidad_vol  }}</td>
                <td>{{ $transporte->mts_2  }}</td>
                <td>{{ $transporte->id_tipo_trans  }}</td>
                <td>
                  <form action="{{ route('transporte.destroy',$transporte->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('transporte.show',$transporte->id) }}">
                        <svg class="icon">
                          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                        </svg></a>
                    </a>
    
                    <a class="btn btn-success" href="{{ route('transporte.edit',$transporte->id) }}">
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
                </td>
            </tr>
          @endforeach
      </tbody>
</table>

@endsection
