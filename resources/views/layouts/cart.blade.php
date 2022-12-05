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
                <li class="nav-item"><a href="{{ route('seguimiento') }}" class="nav-link ">Seguimiento</a></li>
                <li class="nav-item"><a href="{{ url('shop') }}" class="nav-link ">Shop</a></li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="{{ route('cart.index') }}" role="button"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>
                </li>
                @if (Route::has('login'))
                        
                            @auth
                            <li class="nav-item"><a href="{{ route('pedido.index') }}" class="nav-link ">Mis Pedidos</a></li>
                            <li class="d-flex">
                            <form action="{{ route('logout') }}" method="post" class="d-flex">
                                    @csrf
                                    <button class="btn btn-outline-light" type="submit">{{ Auth::user()->nombre_completo }}</button> 
                                </form>
                            </li>
                            @else
                            <li class="d-flex">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-light" type="submit">Login</button>
                                </a>
                            </li>
                            @endauth
                    
                    @endif
                <!-- <li class="nav-item"><a href="#contact" class="nav-link ">Login</a></li> -->

            </ul>

        </div>
    </nav>
        @yield('content')
    </body>
</html>
