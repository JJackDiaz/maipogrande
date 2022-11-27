@include('layouts.cart')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center">Seguimiento Al Extranjero</h2>
        <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Información de mi pedido</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Ingresa Numero de Solictud</h5>
                <form action="{{ route('seguimiento') }}" method="get">
                    <input type="text" class="form-control mb-2" name="numero_solictud" placeholder="Ingresar numero..." value="{{ isset($number) ? $number : ''}}">
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </form>
            </div>
            @if(Session::has('error'))
                <div>{{Session::get('error')}}</div>
            @endif
            @if(Session::has('success'))
                <div>{{Session::get('success')}}</div>
            @endif
            @if (isset($proceso_venta))
                @foreach ($proceso_venta as $item)
                    <h4>Número pedido #{{ $item->solicitud_proceso_id }}</h4>
                    @if ($item->estado == 'subastado')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 35%">Subastado</div>
                        </div>
                    @endif
                    @if ($item->estado == 'en_ruta')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 70%">En ruta</div>
                        </div>
                    @endif
                    @if ($item->estado == 'entregado')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Entregado</div>
                        </div>
                    @endif
            
                @endforeach
            @endif
          </div>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="text-center">Seguimiento Nacional</h2>
        <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Información de mi pedido</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Ingresa Numero de Pedido</h5>
                <form action="{{ route('seguimiento') }}" method="get">
                    <input type="text" class="form-control mb-2" name="numero_pedido" placeholder="Ingresar numero..." value="{{ isset($numero) ? $numero : ''}}">
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </form>
            </div>
            @if(Session::has('error'))
                <div>{{Session::get('error')}}</div>
            @endif
            @if(Session::has('success'))
                <div>{{Session::get('success')}}</div>
            @endif
            @if (isset($pedido))
                @foreach ($pedido as $item)
                    <h4>Número pedido #{{ $item->numero_pedido }}</h4>
                    @if ($item->estado == 'subastado')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 70%">Subastado</div>
                        </div>
                    @endif
                    @if ($item->estado == 'en_ruta')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 70%">En ruta</div>
                        </div>
                    @endif
                    @if ($item->estado == 'entregado')
                        <div class="progress m-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow=75" aria-valuemin="0" aria-valuemax="100" style="width: 70%">Entregado</div>
                        </div>
                    @endif
            
                @endforeach
            @endif
          </div>
    </div>
</section>
