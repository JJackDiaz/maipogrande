@extends('layouts.template')
@section('title')
    <title>Productos</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Productos</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
        <a href="{{ route('producto.create') }}" class="btn btn-warning rounded-pill text-white"> Crear Productos</a>
      </div>
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Cantidad (KG)</th>
          <th scope="col">Calidad</th>
          <th scope="col">precio</th>
          <th scope="col">Fecha Cosecha</th>
          <th scope="col">Precio Unitario</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($productos as $Producto)
          <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $Producto->nombre }}</td>
              <td>{{ $Producto->cantidad }}KG</td>
              <td>{{ $Producto->calidad }}</td>
              <td>${{ $Producto->precio }}</td>
              <td>{{ $Producto->fecha_cosecha }}</td>
              <td>${{ $Producto->precio_unitario }}</td>
              <td>
                <form action="destroy" method="POST">
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
              </form>
              </td>
          </tr>
          @endforeach
      </tbody>
</table>

@endsection