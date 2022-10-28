@extends('layouts.template')
@section('title')
    <title>Productor | Contratos</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Contratos</span></li>
@endsection
@section('content')
    <table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
      <h1>Mis Contratos</h1>
    </div>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">fecha Firma</th>
          <th scope="col">Fecha Termino</th>
          <th scope="col">% Comisión</th>
          <th scope="col">Usuario</th>
          <th scope="col">Estado</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($contratos as $contrato)
          <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $contrato->fecha_firma ? date('d-m-Y', strtotime($contrato->fecha_firma)) : '' }}</td>
              <td>{{ date('d-m-Y', strtotime($contrato->fecha_termino)) }}</td>
              <td>{{ $contrato->porc_comision }}</td>
              <td>{{ $contrato->usuario->nombre_completo }}</td>
              <td>{{ $contrato->is_active }}</td>
              <td>
                <!-- <a class="btn btn-warning" href="{{ route('usuario.show',$contrato->id) }}">
                    <svg class="icon">
                      <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                    </svg></a>
                </a> -->
                @if($contrato->is_active == 'N')
                <div class="alert alert-success text-center p-1" role="alert">
                  <form action="{{ route('contrato.aceptar_contrato',$contrato->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success p-1">
                          <h6 class="text-white">Aceptar Contrato</h6>
                      </button>
                  </form>
                </div>
                @elseif($contrato->is_active == 'Y' && date('d-m-Y', strtotime($contrato->fecha_termino)) == $date && date('d-m-Y', strtotime($contrato->fecha_firma)) > date('d-m-Y', strtotime($contrato->fecha_termino)))
                <div class="alert alert-danger text-center p-1" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                      Contrato Terminado
                    </div>
                  </div>
                </div>
                @else
                <div class="alert alert-primary text-center p-1" role="alert">
                  <div>
                    Contrato aceptado
                  </div>
                  <a class="btn btn-warning p-1" href="{{ route('ver-pdf') }}">
                    <h6>Ver Contrato</h6>
                  </a>
                </div>
                @endif
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>
@endsection

