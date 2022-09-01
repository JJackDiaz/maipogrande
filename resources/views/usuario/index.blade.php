@extends('layouts.template')
@section('title')
    <title>Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Usuarios</span></li>
@endsection
@section('content')

    <h1>Usuario</h1>
    <table class="table table-success table-striped-columns">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Opción</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
            <tr>
                <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $u->nombre }}</td>
                <td>{{ $u->apellido }}</td>
                <td>{{ $u->telefono }}</td>
                <td>{{ $u->email }}</td>
                <td class="">
                  <a href="{{ route('usuario.show') }}"><button type="button" class="btn btn-primary rounded-pill">Ver</button></a>
                  <button type="button" class="btn btn-info rounded-pill">Editar</button>
                  <button type="button" class="btn btn-danger rounded-pill">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection