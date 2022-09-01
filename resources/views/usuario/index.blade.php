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
            <th scope="col">Telefono</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
            <tr>
                <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $u->nombre_completo }}</td>
                <td>{{ $u->telefono }}</td>
                <td>{{ $u->telefono }}</td>
                <td>{{ $u->email }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection