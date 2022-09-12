@extends('layouts.template')
@section('title')
    <title>Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Usuarios</span></li>
@endsection
@section('content')
    <table class="table table-warning table-striped-columns">
      <div class="col-12 text-left m-2">
        <a href="{{ route('usuario.create') }}" class="btn btn-warning rounded-pill text-white"> Crear Usuario</a>
      </div>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo usuario</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
            <tr>
                <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $u->nombre_completo }}</td>
                <td>{{ $u->telefono }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->tipo_usuario->nombre }}</td>
                <td>
                <form action="{{ route('usuario.destroy',$u->id) }}" method="POST">
   
                    <a class="btn btn-warning" href="{{ route('usuario.show',$u->id) }}">
                        <svg class="icon">
                          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass') }}"></use>
                        </svg></a>
                    </a>
    
                    <a class="btn btn-success" href="{{ route('usuario.edit',$u->id) }}">
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