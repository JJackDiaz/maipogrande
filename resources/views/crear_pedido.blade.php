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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
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
                        </div>
                    @endif
                <!-- <li class="nav-item"><a href="#contact" class="nav-link ">Login</a></li> -->

            </ul>

        </div>
    </nav>
    <div class="row justify-content-center" style="margin-top: 80px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cart.store_pedido', $id ) }}">
                        @csrf
                        <!-- direccion -->
                        <div class="form-group row m-2">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('direccion') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
    
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row m-2">
                            <label for="comuna" class="col-md-4 col-form-label text-md-right">{{ __('comuna') }}</label>
                            <div class="col-md-6">
                                <input id="comuna" type="text" class="form-control @error('comuna') is-invalid @enderror" name="comuna" value="{{ old('comuna') }}" required autocomplete="comuna" autofocus>
    
                                @error('comuna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row m-2">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numero de casa') }}</label>
                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>
    
                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row m-2">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
    
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row m-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" id="id" class="id" value="{{ $id }}">
                        
                        <div class="form-group row m-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning text-white">
                                    {{ __('Continuar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
