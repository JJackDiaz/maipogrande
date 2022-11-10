<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <title>Maipo Grande</title>
</head>
<body>

    <!-------------------------Navigation--------------------->

    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a href="index.html" class="navbar-brand"><img src="{{ asset('images/logos/puesto.png') }}" style="width:60px;height:60px;" class="rounded-right" alt="logo"
                style="background-color:white;padding: 6px;"></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#demo"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="demo">
            <ul class="navbar-nav ml-auto text-capitalize">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link ">Inicio</a></li>
                <li class="nav-item"><a href="#port" class="nav-link ">Seguimiento</a></li>
                <li class="nav-item"><a href="{{ url('shop') }}" class="nav-link ">Shop</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link"
                       href="{{ url('/cart') }}"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>
                </li>
                @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <li class="d-flex">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-light" type="submit">{{ Auth::user()->nombre_completo }}</button>
                                </a>
                            </li>
                            @else
                            <li class="d-flex">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-light" type="submit">Login</button>
                                </a>
                            </li>
                            @endauth
                        </div>
                    @endif
                <!-- <li class="nav-item"><a href="#contact" class="nav-link ">Login</a></li> -->

            </ul>

        </div>
    </nav>
        <!-- Section-->
        <section class="container mt-5">
            <div class="card text-center">
                <div class="card-header">
                   Factura
                </div>
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                    @foreach ($venta_lo as $item)    
                            <div class="card-body">
                                <h5 class="card-title">Info</h5>
                                <p class="card-text">Numero Venta {{ $item->numero_venta }}</p>
                                <p class="card-text">Detalle : {{ $item->detalle }}</p>
                                <p class="card-text">Estado : {{ $item->estado_ex }}</p>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Pagos</h5>
                                <p class="card-text">Producto : ${{ $item->total_venta - $item->comision - $item->servicio - $item->iva }}</p>
                                <p class="card-text">Comision : ${{ $item->comision }}</p>
                                <p class="card-text">Servicios : ${{ $item->servicio }}</p>
                                <p class="card-text">Iva : ${{ $item->iva }}</p>
                                <h5 class="card-title">Total : ${{ $item->total_venta }}</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('payment-shop')}}" method="post" class="m-2">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $item->total_venta }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    
                    <button type="submit" class="btn btn-primary mt-3">Pagar ${{ $item->total_venta }} via Paypal</button>
                </form>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                Maipo Grande
            </div>
        </div>
    </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>