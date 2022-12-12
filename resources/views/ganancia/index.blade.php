@extends('layouts.template')
@section('title')
    <title>MaipoGrande | Ganancias</title>
@endsection
@section('ruta')
    <li class="breadcrumb-item active"><span>Ganancias</span></li>
@endsection
@section('content')
<div class="container-lg">
    <div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-primary">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
            <div class="fs-4 fw-semibold">{{ $mi_usuario->nombre_completo }}<span class="fs-6 fw-normal"></span></div>
            <div>Mi Usuario</div>
            </div>
            <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-info">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
            <div class="fs-4 fw-semibold">{{ $mi_usuario->email }}<span class="fs-6 fw-normal"></div>
            <div>Correo</div>
            </div>
            <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart2" height="70"></canvas>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-warning">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
            <div class="fs-4 fw-semibold">{{ $ganancia_externa }}USD<span class="fs-6 fw-normal"> (${{ round($ganancia_externa * 861) }})</div>
            <div>Total Ventas externas</div>
            </div>
            <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
            <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 text-white bg-danger">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
            <div>
            <div class="fs-4 fw-semibold">{{ $ganancia_local }}USD<span class="fs-6 fw-normal"> (${{ round($ganancia_local * 861) }})</div>
            <div>Total Ventas Local</div>
            </div>
            <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
            </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
            <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
        </div>
    </div>
    <!-- /.col-->
    </div>
    <!-- /.row-->
    <!-- /.card.mb-4-->
    <div class="row">
    <div class="col-sm-6 col-lg-4">
        <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
        <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
            <canvas id="social-box-chart-1" height="90"></canvas>
            </div>
        </div>
        <div class="card-body row text-center">
            <div class="col">
            <div class="fs-5 fw-semibold">89k</div>
            <div class="text-uppercase text-medium-emphasis small">friends</div>
            </div>
            <div class="vr"></div>
            <div class="col">
            <div class="fs-5 fw-semibold">459</div>
            <div class="text-uppercase text-medium-emphasis small">feeds</div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-4">
        <div class="card mb-4" style="--cui-card-cap-bg: #00aced">
        <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
            <canvas id="social-box-chart-2" height="90"></canvas>
            </div>
        </div>
        <div class="card-body row text-center">
            <div class="col">
            <div class="fs-5 fw-semibold">973k</div>
            <div class="text-uppercase text-medium-emphasis small">followers</div>
            </div>
            <div class="vr"></div>
            <div class="col">
            <div class="fs-5 fw-semibold">1.792</div>
            <div class="text-uppercase text-medium-emphasis small">tweets</div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-4">
        <div class="card mb-4" style="--cui-card-cap-bg: #4875b4">
        <div class="card-header position-relative d-flex justify-content-center align-items-center">
            <svg class="icon icon-3xl text-white my-4">
            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>
            </svg>
            <div class="chart-wrapper position-absolute top-0 start-0 w-100 h-100">
            <canvas id="social-box-chart-3" height="90"></canvas>
            </div>
        </div>
        <div class="card-body row text-center">
            <div class="col">
            <div class="fs-5 fw-semibold">500+</div>
            <div class="text-uppercase text-medium-emphasis small">contacts</div>
            </div>
            <div class="vr"></div>
            <div class="col">
            <div class="fs-5 fw-semibold">292</div>
            <div class="text-uppercase text-medium-emphasis small">feeds</div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <div class="row">
                        <h1 class="text-center">{{ $cant_externo }}</h1>
                        <h2 class="text-center">Proceso de ventas</h2>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <div class="row">
                        <h1 class="text-center">{{ $cant_local }}</h1>
                        <h2 class="text-center">Pedidos En Portal</h2>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <div class="row">
                        <h1 class="text-center">{{ $cant_local + $cant_externo }}</h1>
                        <h2 class="text-center">Total</h2>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection
