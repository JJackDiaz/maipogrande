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

    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
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
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                @if(Session::has('error'))
                <div>{{Session::get('error')}}</div>
                @endif
                @if(Session::has('success'))
                    <div>{{Session::get('success')}}</div>
                @endif
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($saldos as $saldo)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="https://libbys.es/wordpress/wp-content/uploads/2014/12/multifrutas-300x200.jpg" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $saldo->nombre }}</h5>
                                        <!-- Product price-->
                                        ${{ $saldo->precio_unitario }} <br>
                                        Cantidad: {{ $saldo->cantidad }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $saldo->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $saldo->producto_id }}" id="producto_id" name="producto_id">
                                        <input type="hidden" value="{{ $saldo->nombre }}" id="nombre" name="nombre">
                                        <input type="hidden" value="{{ $saldo->precio_unitario }}" id="precio" name="precio">
                                        <input type="hidden" value="1" id="cantidad" name="cantidad">
                                        <input type="hidden" value="{{ $saldo->id }}" id="id_saldo" name="id_saldo">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>