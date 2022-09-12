@extends('layouts.template')
@section('title')
    <title>Contratos</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Contratos</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
      <a href="{{ route('usuario.create') }}" class="btn btn-warning rounded-pill text-white"> Crear Contrato</a>
    </div>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">fecha Firma</th>
          <th scope="col">Fecha Termino</th>
          <th scope="col">% Comisión</th>
          <th scope="col">Usuario</th>
          <th scope="col">Creacion</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($contratos as $contrato)
          <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $contrato->fecha_firma }}</td>
              <td>{{ $contrato->fecha_termino }}</td>
              <td>{{ $contrato->porc_comision }}</td>
              <td>{{ $contrato->usuario->nombre_completo }}</td>
              <td>{{ $contrato->created_at }}</td>
              <td>
              <form action="{{ route('usuario.destroy',$contrato->id) }}" method="POST">
 
                  <a class="btn btn-warning" href="{{ route('usuario.show',$contrato->id) }}">
                      <svg class="icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                      </svg></a>
                  </a>
  
                  <a class="btn btn-success" href="{{ route('usuario.edit',$contrato->id) }}">
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
