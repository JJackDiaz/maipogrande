@extends('layouts.template')
@section('title')
    <title>Crear Solicitud</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Solicitud</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('solicitud.store') }}">
                    @csrf

                    <div class="form-group row m-2">
                        <label for="producto" class="col-md-4 col-form-label text-md-right">{{ __('producto') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="producto" id="producto" value="producto">
                                <option value=''>Selecciona Producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->nombre }}">{{ $producto->nombre }} - Cantidad: {{ $producto->cantidad }}KG</option>
                                @endforeach
                            </select>
                            
                            @error('usuario_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>     
                    </div>

                    <div class="form-group row m-2">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad KG') }}</label>

                        <div class="col-md-6">
                            <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus placeholder="10">

                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                        <div class="col-md-6">
                            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus placeholder="Alexanderplatz #4555">

                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="pais_id" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="pais_id" id="pais_id" value="pais_id">
                                <option value=''>Selecciona Pais</option>
                                @foreach($paises as $pais)
                                <option id="pais" value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                            
                            @error('pais_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>     
                    </div>

                    <div class="form-group row m-2">
                        <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                        <div class="col-md-6">
                            <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ old('ciudad') }}" required autocomplete="ciudad" autofocus placeholder="Berlin">

                            @error('ciudad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- <div class="form-group row m-2">
                        <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('empresa') }}</label>

                        <div class="col-md-6">
                            <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" required autocomplete="empresa" autofocus>

                            @error('empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->

                    <div class="form-group row m-2">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning text-white">
                                {{ __('Solicitar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
