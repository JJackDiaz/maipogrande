@extends('layouts.template')
@section('title')
    <title>Crear Proceso Venta</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Proceso Venta</span></li>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('proceso-venta.store') }}">
                    @csrf
                    <!-- fecha -->
                    <div class="form-group row m-2">
                        <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Proceso') }}</label>
                        <div class="col-md-6">
                            <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus>

                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- id_solicitud -->
                    <div class="form-group row m-2">
                        <label for="id_tipo_pro" class="col-md-4 col-form-label text-md-right">{{ __('Solicitud') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="id_solicitud" id="id_solicitud" value="id_solicitud">
                                <option value=''>Selecciona Solicitud</option>
                                @foreach($solicitudes as $solicitud)
                                <option value="{{ $solicitud->id }}">Solicitud: {{ $solicitud->id }} Producto: {{ $solicitud->producto }} Cantidad: {{ $solicitud->cantidad }}KG</option>
                                @endforeach
                            </select>
                            
                            @error('id_tipo_pro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>     
                    </div>

                    <!-- producto_id -->
                    <div class="form-group row m-2">
                        <label for="id_tipo_pro" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="producto_id" id="producto_id" value="producto_id">
                                <option value=''>Selecciona Producto</option>
                                @foreach($productos as $producto)
                                    @foreach($solicitudes as $solicitud)
                                    @if ($solicitud->producto == $producto->nombre)
                                        <option value="{{ $producto->id }}">Producto: {{ $producto->nombre }} Cantidad: {{ $producto->cantidad }}KG Precio:{{ $producto->precio }}</option>
                                    @else
                                        <option disabled>No hay productos asociados</option>
                                    @endif
                                    @endforeach
                                @endforeach
                            </select>
                            
                            @error('id_tipo_pro')
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