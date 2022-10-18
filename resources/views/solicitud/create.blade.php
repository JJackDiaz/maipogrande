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
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                        <div class="col-md-6">
                            <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus>

                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="producto" class="col-md-4 col-form-label text-md-right">{{ __('producto') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="producto" id="producto" value="producto">
                                <option value=''>Selecciona Usuario</option>
                                @foreach($productos as $producto)
                                <option value="{{ $producto->nombre }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            
                            @error('usuario_id')
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
                                {{ __('Agregar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection