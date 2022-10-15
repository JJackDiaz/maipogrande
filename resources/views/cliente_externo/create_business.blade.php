@extends('layouts.template')
@section('title')
    <title>Crear Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Registrar Empresa</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('cliente_externo.store_business') }}">
                    @csrf
                    <div class="form-group row m-2">
                        <label for="nombre_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                        <div class="col-md-6">
                            <input id="nombre_empresa" type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required autocomplete="nombre_empresa" autofocus>

                            @error('nombre_empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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
                        <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                        <div class="col-md-6">
                            <select name="ciudad_id" id="ciudad_id" value="ciudad_id">
                                <option value=''>Selecciona Ciudad</option>
                                @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre_ci }} - {{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>

                            @error('ciudad_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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