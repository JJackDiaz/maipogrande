@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Venta Local</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Venta Local</span></li>
@endsection
@section('content')
<button type="button" class="btn btn-warning">
  Listos para publicar <span class="badge text-bg-primary">{{ $count }}</span>
</button>
<table class="table table-warning table-striped-columns">
    <div class="col-12 text-left m-2">
    </div>
      <thead>
        <tr>
        <th scope="col">#</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Estado</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($saldos as $saldo)
          <tr>
            <th scope="row"><?php echo $cont; $cont++; ?></th>
              <td>{{ $saldo->nombre }}</td>
              <td>${{ $saldo->precio_unitario }}</td>
              <td>{{ $saldo->cantidad }}</td>
              <td>{{ $saldo->precio }}</td>
              <td>{{ $saldo->estado }}</td>
              <td>
                <form action="#" method="POST">  
                    <a class="btn btn-success" href="#">
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
