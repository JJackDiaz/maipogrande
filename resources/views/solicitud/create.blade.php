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
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad KG') }}</label>

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
                                <option value=''>Selecciona Producto</option>
                                <option value="manzana">Manzana</option>
                                <option value="pera">Pera</option>
                                <option value="uva">Uva</option>
                                <option value="melon">Melon</option>
                                <option value="frutilla">Frutilla</option>
                                <option value="banana">Banana</option>
                                <option value="sandia">Sandia</option>
                            </select>
                            
                            @error('usuario_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>     
                    </div>

                    <div class="form-group row m-2">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

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
                        <label for="pais_id" class="col-md-4 col-form-label text-md-right">{{ __('Pais') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="pais_id" id="pais_id" value="pais_id">
                                <option value=''>Selecciona Pais</option>
                                @foreach($paises as $pais)
                                <option id="pais" onchange="getStates({{ $pais['country_name'] }})" value="{{ $pais['country_name'] }}">{{ $pais['country_name'] }}</option>
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
                        <label for="ciudad_id" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="ciudad_id" id="ciudad_id" value="ciudad_id">
                                <option value=''>Selecciona Ciudad</option>
                                @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre_ci }}</option>
                                @endforeach
                            </select>
                            
                            @error('ciudad_id')
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
@section('js')
<script>

document.getElementById("pais").addEventListener("click", myFunction);

function myFunction() {
  console.log(document.getElementById("pais").value);
}

function getStates(pais)
{
    //var url = $('#get-state').val();
    //let pais = document.getElementById("pais").value;
    //var pais = document.getElementById("pais").value; 

    //console.log(pais);

    // $.ajax({
    //     url: url+'/'+productId+'/'+encodeURI(quantity),
    //     type: "GET",
    //     dataType: "json",
    //     success:function(amount) {
    //         setValue(quantity, amount);
    //     }
    // });
};
</script>
@endsection