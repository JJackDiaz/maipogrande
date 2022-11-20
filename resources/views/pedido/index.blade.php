@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Pedidos</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Pedidos</span></li>
@endsection
@section('content')
<table class="table table-warning table-striped-columns">
  @if(Auth::user()->id_tipo_usuario==1)
    <div class="col-12 text-left m-2">
        <a href="{{ route('subasta.index') }}" class="btn btn-warning rounded-pill text-white">Crear subasta</a>
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
          <th scope="col">Nº Pedido</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Estado</th>
          <th scope="col">Id Saldo</th>
          <th scope="col">Opción</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($pedidos as $pedido)
            <tr>
              <th scope="row"><?php echo $cont; $cont++; ?></th>
                <td>{{ $pedido->numero_pedido }}</td>
                <td>${{ $pedido->precio  }}</td>
                <td>{{ $pedido->cantidad  }}KG</td>
                <td>{{ $pedido->estado  }}</td>
                <td>{{ $pedido->saldo_id }}</td>
                <td>
                  @if(Auth::user()->id_tipo_usuario==1 && $pedido->estado == 'revisando')
                  <a class="btn btn-warning" href="{{ route('crear_subasta_local' , $pedido->numero_pedido) }}">
                    <h6>Crear Subasta</h6>
                  </a>
                  @endif
                  @if(Auth::user()->id_tipo_usuario==4 && $pedido->estado == 'subastado')
                  <a class="btn btn-warning" href="{{ route('cart.checkout' , $pedido->numero_pedido) }}">
                    <h6>Checkout</h6>
                  </a>
                  @elseif(Auth::user()->id_tipo_usuario==4 && $pedido->estado == 'pagado')
                  <a class="btn btn-warning" href="">
                    <h6>Recibido</h6>
                  </a>
                  @elseif(Auth::user()->id_tipo_usuario==4 && $pedido->estado == 'revisando')
                  <h6>Procesando</h6>
                  @endif
                </td>
            </tr>
          @endforeach
      </tbody>
</table>

@endsection
