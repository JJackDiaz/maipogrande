@include('layouts.cart')
@section('content')

    <!---------------------------Image-Slide-->

    <div class="carousel slide" data-ride="carousel" data-interval="3000" id="imgload">
    </div>




    <!-----------------------Buy Section----------------->
    <section id="card1" class="padding">
    </section>
    <!----Two column section----->

    <section id="twocolumn" class="padding mt-5">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <img src="{{ asset('images/logos/puesto.png') }}" alt="img"  style="width:400px;height:600;">


                </div>
                <div class="col-xs-12 col-sm-6 text-center">
                    <h3 class="mb-4">Nosotros</h3>
                    <p class="lead "> La empresa “Maipo Grande”, agrupa empresas dedicadas a la producción de frutas en la zona metropolitana
                        sur. La misión de la empresa es facilitar la comercialización de los productos de sus diferentes clientes en el
                        mercado extranjero y local. <h6>Disfruta con tu Fruta!!!</h6>
                    </p>

                    <a href="{{ route('shop') }}" class="btn btn-outline-danger btn-sm mt-4">
                        Tienda
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--------------------------------team Sections---------------->



    <section id="team" class="padding">

        <div class="container">
            {{-- <div class="row">
                <div class="col-12 text-center">
                    <h3 class="display-4 mb-4">Ofertas</h3>
                    <hr class="my-4">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <img src="img/team5.jpg" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>
                        </div>
                    </div>

                </div>
            </div> --}}
    </section>



    <!-----------------------------Two Columns----------------------------->

    <section id="twocolumn2" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="mt-5">
                        <img src="{{ asset('images/delivery/delivery.png') }}" alt="img" style="width:400px;height:600;" class="img-fluid">
                    </div>

                </div>

                <div class="col-md-6 col-sm-12 pad">
                    <h3>Delivery</h3>
                    <p>Pide desde casa, te llevamos tu fruta hasta la puerta de tu hogar. Maipo Grande gestiona tu transporte con nuestros procesos 
                        logisticos. Contamos con los mejores precios, no lo dudes Maipo Grande a tu servicio.
                    </p>

                    <button class="btn btn-outline-secondary ">Read More</button>

                </div>

            </div>

        </div>






    </section>




    <!-------------------------Contact area------------------>
    <section id="contact" class="padding">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h4 class="display-4 text-center">Contactanos</h4>
                    <hr class="my-4">

                </div>
                    
                    <div class="col-xs-12 col-md-6 " id="contact" class="one">
                        <div class="form-group text-center">
                            <br>
                            <label class="bold">Email</label>
                            <h5>contacto@maipogrande.cl</h5>
                            <br>
                            <label for="">Telefono</label>
                            <h5>222 666 5555 222</h5>
                            <br>
                            <label for="">Direccion</label>
                            <h5>Ramón Subercaseaux 736</h5>
                        </div>
                    </div>
 
                


                <div class="col-xs-12 col-md-6" id="contact" class="two">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d4977.539675263938!2d-70.5715805140476!3d-33.628410145131994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d-33.6329087!2d-70.5646375!4m3!3m2!1d-33.6330063!2d-70.5643253!5e0!3m2!1ses-419!2scl!4v1668354438138!5m2!1ses-419!2scl" width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

            </div>

        </div>

    </section>

    <!--------------------------Footer------------>

    <footer>

        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-12 text-center bg-light text-dark">
                    <h3>Copyright &copy;2022 maipogrande.com</h3>

                </div>


            </div>

        </div>



    </footer>


    <script>
        window.sr = ScrollReveal();
        sr.reveal('.navbar', {
            duration: 5000,
            origin: 'top'
        });

        sr.reveal('.left1', {
            duration: 1000,
            origin: 'top'
        });





        sr.reveal('.showcase-left', {
            duration: 2000,
            origin: 'top',
            distance: '300px'
        });
        sr.reveal('.showcase-right', {
            duration: 2000,
            origin: 'right',
            distance: '300px'
        });
        sr.reveal('.showcase-btn', {
            duration: 2000,
            delay: 2000,
            origin: 'bottom'
        });
        sr.reveal('#testimonial div', {
            duration: 2000,
            origin: 'bottom'
        });
        sr.reveal('.left1', {
            duration: 2000,
            origin: 'left',
            distance: '300px',
            viewFactor: 0.2
        });
        sr.reveal('.right1', {
            duration: 2000,
            origin: 'right',
            distance: '300px',
            viewFactor: 0.2
        });
    </script>



    <script>
        $(function () {
            // Smooth Scrolling
            $('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location
                    .hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>


