<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <title>Maipo Grande</title>
</head>
<body>

    <!-------------------------Navigation--------------------->

    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a href="index.html" class="navbar-brand"><img src="{{ asset('images/logos/puesto.png') }}" style="width:60px;height:60px;" class="rounded-right" alt="logo"
                style="background-color:white;padding: 6px;"></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#demo"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="demo">
            <ul class="navbar-nav ml-auto text-capitalize">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link ">Inicio</a></li>
                <li class="nav-item"><a href="#port" class="nav-link ">Seguimiento</a></li>
                <li class="nav-item"><a href="{{ url('shop') }}" class="nav-link ">Shop</a></li>
                @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <li class="d-flex">
                                    <a href="{{ route('home') }}">
                                        <button class="btn btn-outline-light" type="submit">Home</button>
                                    </a>
                                </li>
                            @else
                            <li class="d-flex">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-light" type="submit">Login</button>
                                </a>
                            </li>
                            @endauth
                        </div>
                    @endif

            </ul>

        </div>



    </nav>

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
                    <p class="lead ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit. Ut aliquam explicabo, corrupti ipsa sapiente necessitatibus
                        quae id ducimus corporis sunt!
                    </p>

                    <button class="btn btn-outline-danger btn-sm mt-4" type="button">Shop</button>
                </div>
            </div>
        </div>
    </section>

    <!--------------------------------team Sections---------------->



    <section id="team" class="padding">

        <div class="container">
            <div class="row">
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
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card">
                        <img src="img/team1.png" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card">
                        <img src="img/team2.png" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card">
                        <img src="img/team3.png" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card">
                        <img src="img/team2.png" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card">
                        <img src="img/team3.png" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="card">
                        <img src="img/team4.jpg" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="card">
                        <img src="img/team5.jpg" alt="img" class="img-fluid">
                        <div class="card-body">
                            <h2 class="card-title">Jack Maa</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="card-link stretched-link">Know more</a>

                        </div>
                    </div>





                </div>






            </div>

        </div>


    </section>



    <!-----------------------------Two Columns----------------------------->

    <section id="twocolumn2" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="">
                        <img src="{{ asset('images/logos/puesto.png') }}" alt="img" style="width:400px;height:600;" class="img-fluid">
                    </div>

                </div>

                <div class="col-md-6 col-sm-12 pad">
                    <h3>Sobre Nuestros Productos</h3>
                    <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat

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


                    <form class="mb-sm-4" id="for">


                        <div class="form-group">
                            <label for="exampleFormControlInput2">Name</label>
                            <input type="name" class="form-control" id="exampleFormControlInput2"
                                placeholder="User Name">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>




                </div>



                <div class="col-xs-12 col-md-6" id="contact" class="two">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115806.34359550575!2d91.79094155131145!3d24.899747201107232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1516883061409"
                        width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>




















            </div>

        </div>

    </section>

    <!--------------------------Footer------------>

    <footer>

        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-12 text-center bg-light text-dark">
                    <h3>Copyright &copy; w3.com</h3>

                </div>


            </div>

        </div>



    </footer>

    <!------------------------Java Script---------------------->


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
































</body>
</html>