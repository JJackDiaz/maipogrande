@extends('layouts.template')
@section('title')
    <title>Crear Transporte</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Transporte</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('transporte.store') }}">
                    @csrf
                    <!-- descripcion -->
                    <div class="form-group row m-2">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Detalles') }}</label>
                        <div class="col-md-6">
                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus placeholder="Camion 3/4">

                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="capacidad_kg" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad Carga KG/Tonelada') }}</label>
                        <div class="col-md-6">
                            <input id="capacidad_kg" type="number" class="form-control @error('capacidad_kg') is-invalid @enderror" name="capacidad_kg" value="{{ old('capacidad_kg') }}" required autocomplete="capacidad_kg" autofocus placeholder="15">

                            @error('capacidad_kg')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="capacidad_vol" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad Volumen') }}</label>
                        <div class="col-md-6">
                            <input id="capacidad_vol" type="number" class="form-control @error('capacidad_vol') is-invalid @enderror" name="capacidad_vol" value="{{ old('capacidad_vol') }}" required autocomplete="capacidad_vol" autofocus placeholder="1000">

                            @error('capacidad_vol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="mts_2" class="col-md-4 col-form-label text-md-right">{{ __('Metros de largo (Espacio de carga)') }}</label>
                        <div class="col-md-6">
                            <input id="mts_2" type="number" class="form-control @error('mts_2') is-invalid @enderror" name="mts_2" value="{{ old('mts_2') }}" required autocomplete="mts_2" autofocus placeholder="10">

                            @error('mts_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-2">
                        <label for="id_tipo_trans" class="col-md-4 col-form-label text-md-right">{{ __('Tipo vehiculo') }}</label>

                        <div class="col-md-6">
                        
                            <select name="id_tipo_trans" id="id_tipo_trans" value="id_tipo_trans" class="form-control">
                                <option value=''>Selecciona Tipo de vehículo</option>
                                <option value="1">Camión</option>
                                <option value="2">Camioneta</option>
                                <option value="3">Furgon</option>
                            </select>

                            @error('id_tipo_trans')
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