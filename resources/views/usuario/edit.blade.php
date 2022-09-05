@extends('layouts.template')
@section('title')
    <title>Crear Usuarios</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Usuario</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('usuario.update',$usuario->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- <div class="form-group row">
                        <label for="id_tipo_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Tipo usuario') }}</label>

                        <div class="col-md-6">
                        
                            <select name="id_tipo_usuario" id="id_tipo_usuario" value="id_tipo_usuario">
                                <option value="{{ $usuario->id_tipo_usuario }}">Administrador</option>
                                <option value="{{ $usuario->id_tipo_usuario }}">Consultor</option>
                                <option value="{{ $usuario->id_tipo_usuario }}">Opel</option>
                                <option value="{{ $usuario->id_tipo_usuario }}">Audi</option>
                            </select>

                            @error('id_tipo_usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-group row m-2">
                        <label for="nombre_completo" class="col-md-4 col-form-label text-md-right">{{ __('nombre_completo') }}</label>

                        <div class="col-md-6">
                            <input id="nombre_completo" type="text" class="form-control @error('nombre_completo') is-invalid @enderror" name="nombre_completo" value="{{ $usuario->nombre_completo }}" required autocomplete="nombre_completo" autofocus>

                            @error('nombre_completo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('telefono') }}</label>

                        <div class="col-md-6">
                            <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $usuario->telefono }}" required autocomplete="telefono" autofocus>

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                            @error('email')
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