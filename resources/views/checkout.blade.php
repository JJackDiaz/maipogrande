@include('layouts.cart')
@section('content')

        <!-- Section-->
        <section class="container mt-5">
            <div class="card text-center">
                <div class="card-header">
                   Factura
                </div>
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                    @foreach ($venta_lo as $item)    
                            <div class="card-body">
                                <h5 class="card-title">Info</h5>
                                <p class="card-text">Numero Venta {{ $item->numero_venta }}</p>
                                <p class="card-text">Detalle : {{ $item->detalle }}</p>
                                <p class="card-text">Estado : {{ $item->estado_lo }}</p>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Pagos</h5>
                                <p class="card-text">Producto : ${{ $item->total_venta - $item->comision - $item->servicio - $item->iva }}</p>
                                <p class="card-text">Comision : ${{ number_format($item->comision,2) }}</p>
                                <p class="card-text">Servicios : ${{ number_format($item->servicio,1) }}</p>
                                <p class="card-text">Iva : ${{ number_format($item->iva,2) }}</p>
                                <h5 class="card-title">Total : ${{ number_format($item->total_venta,1) }}</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('payment-shop')}}" method="post" class="m-2">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $item->total_venta }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    
                    <button type="submit" class="btn btn-primary mt-3">Pagar ${{ $item->total_venta }} via Paypal</button>
                </form>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                Maipo Grande
            </div>
        </div>
    </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>