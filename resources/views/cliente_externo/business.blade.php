@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Solicitud</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Solicitud</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
        <a href="{{ route('cliente_externo.create_business') }}" class="btn btn-warning rounded-pill text-white"> Crear Empresa</a>
      </div>
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">Razon Social</th>
          <th scope="col">Direcion</th>
          <th scope="col">Ciudad</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          {{-- @foreach ($solicitudes as $solicitud) --}}
          <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <form action="" method="POST">
   
                  <a class="btn btn-warning" href="">
                      <svg class="icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                      </svg></a>
                  </a>
  
                  <a class="btn btn-success" href="">
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
          {{-- @endforeach --}}
      </tbody>
</table>


@endsection
