@extends('layouts.template')
@section('title')
    <title>Editar Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Editar Empresa</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('detalle_cliente.update', $detalle_cliente->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row m-2">
                        <label for="nombre_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                        <div class="col-md-6">
                            <input id="nombre_empresa" type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" name="nombre_empresa" value="{{ $detalle_cliente->nombre_empresa }}" required autocomplete="nombre_empresa" autofocus>

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
                            <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $detalle_cliente->direccion }}" required autocomplete="direccion" autofocus>

                            @error('direccion')
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