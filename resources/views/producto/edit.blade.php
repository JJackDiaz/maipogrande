@extends('layouts.template')
@section('title')
    <title>Editar Producto</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Editar Producto</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('producto.update',$producto->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- nombre -->
                    <div class="form-group row m-2">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $producto->nombre }}" required autocomplete="nombre" autofocus>

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- cantidad -->
                    <div class="form-group row m-2">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                        <div class="col-md-6">
                            <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ $producto->cantidad }}" required autocomplete="cantidad" autofocus>

                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Calidad -->
                    <div class="form-group row m-2">
                        <label for="calidad" class="col-md-4 col-form-label text-md-right">{{ __('Calidad') }}</label>
                        <div class="col-md-6">
                            <input id="calidad" type="text" class="form-control @error('calidad') is-invalid @enderror" name="calidad" value="{{ $producto->calidad }}" required autocomplete="calidad" autofocus>

                            @error('calidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- precio -->
                    <div class="form-group row m-2">
                        <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
                        <div class="col-md-6">
                            <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ $producto->precio }}" required autocomplete="precio" autofocus>

                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- fecha_cosecha -->
                    <div class="form-group row m-2">
                        <label for="fecha_cosecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Cosecha') }}</label>
                        <div class="col-md-6">
                            <input id="fecha_cosecha" type="date" class="form-control @error('fecha_cosecha') is-invalid @enderror" name="fecha_cosecha" value="{{ $producto->fecha_cosecha}}" required autocomplete="fecha_cosecha" autofocus>

                            @error('fecha_cosecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-group row m-2">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Editar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection