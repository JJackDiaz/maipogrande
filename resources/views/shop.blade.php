@include('layouts.cart')
@section('content')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                @if(Session::has('error'))
                <div>{{Session::get('error')}}</div>
                @endif
                @if(Session::has('success'))
                    <div>{{Session::get('success')}}</div>
                @endif
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($saldos as $saldo)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="https://libbys.es/wordpress/wp-content/uploads/2014/12/multifrutas-300x200.jpg" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $saldo->nombre }}</h5>
                                        <!-- Product price-->
                                        ${{ $saldo->precio_unitario }} <br>
                                        Cantidad: {{ $saldo->cantidad }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $saldo->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $saldo->producto_id }}" id="producto_id" name="producto_id">
                                        <input type="hidden" value="{{ $saldo->nombre }}" id="nombre" name="nombre">
                                        <input type="hidden" value="{{ $saldo->precio_unitario }}" id="precio" name="precio">
                                        <input type="hidden" value="1" id="cantidad" name="cantidad">
                                        <input type="hidden" value="{{ $saldo->id }}" id="id_saldo" name="id_saldo">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
