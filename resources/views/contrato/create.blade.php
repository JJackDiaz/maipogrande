@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Contratos</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Contratos</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('contrato.store') }}">
                    @csrf
                    <div class="form-group row m-2">
                        <label for="usuario_id" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                        <div class="col-md-6">
                            <select name="usuario_id" id="usuario_id" value="usuario_id">
                                <option value=''>Selecciona Usuario</option>
                                @foreach($usuarios as $usu)
                                <option value="{{ $usu->id }}">{{ $usu->nombre_completo }}</option>
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
                        <label for="fecha_termino" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_termino') }}</label>

                        <div class="col-md-6">
                            <input id="fecha_termino" type="date" class="form-control @error('fecha_termino') is-invalid @enderror" name="fecha_termino" value="{{ old('fecha_termino') }}" required autocomplete="fecha_termino" autofocus>

                            @error('fecha_termino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="porc_comision" class="col-md-4 col-form-label text-md-right">{{ __('Porcentaje Comisiòn') }}</label>

                        <div class="col-md-6">
                            <input id="porc_comision" type="text" class="form-control @error('porc_comision') is-invalid @enderror" name="porc_comision" value="{{ old('porc_comision') }}" required autocomplete="porc_comision" autofocus>

                            @error('porc_comision')
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