@extends('layouts.template')
@section('title')
    <title>Crear Subasta</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Crear Subasta</span></li>
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