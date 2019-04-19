<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/master-public.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous"> @yield('css_propio')
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    @yield('js_onload')
    <title>@yield("titulo")</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" background="none">
        <a href="{{ url('/') }}"><img  src="{{ asset('./img/Spami_M.png') }}" width="60px" height="60px"  alt=""></a>
        <div class="collapse navbar-collapse text-black-50 ml-4" id="navbarNav">
            <!-- d-flex justify-content-end -->
            <ul class="navbar-nav">
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ url('/quien_somos') }}">{{ __('frontend.quienes_somos') }}</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ url('/como_ayudar') }}">{{ __('frontend.como_ayudar') }}</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ url('/estadisticas') }}">{{ __('frontend.estadisticas') }}</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="{{ url('/challenges') }}">{{ __('frontend.nuestros_retos') }}</a>
                </li>
                <li class="nav-item p-2">
                    <a class="nav-link" href="https://www.protectoramataro.org/es/">{{ __('frontend.pagina_oficial') }}</a>
                </li>
            </ul>
        </div>
        <div class="option-container row">
            <div class="dropdown" style="float: left;">
                <button class="btn bg-transparent " style="color:grey" type="button" id="drIdioma" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                                  <span class="fa fa-globe"></span> <span class="fa fa-sort-down mb-1"></span>
                                </button>
                <div class="dropdown-menu" aria-labelledby="drIdioma">
                    <a class="dropdown-item" href="{{ url('chgIdioma/ca') }}">Català</a>
                    <a class="dropdown-item" href="{{ url('chgIdioma/es') }}">Español</a>
                    <a class="dropdown-item" href="{{ url('chgIdioma/en') }}">Inglés</a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <a class="nav-link btn mr-2" href="{{ url('backend/login') }}"><i class="fas fa-sign-in-alt" style="font-size: 20px"></i></a>
        </div>
    </nav>

    @yield('contenido')
    <footer class="footer p-5">
        <div class="row">
            <div class="col-md-6">
                <h5 style="color: #fff !important">Direccion</h5>
                <p style="font-size: 12px !important;text-align:justify">
                    Servicios Centrales: Calle Sant Cugat 102-104, Mataró 08302 (Barcelona). Tel. 937566066-647972293
                </p>
                <p style="font-size: 12px !important;text-align:justify">
                    Espacio Veterinario: (adopción de cachorros de gatos y asistencia veterinaria): Calle Sant Cugat, 102 Bajos 08302 Mataró
                    (Barcelona). Tel. 937566066-647972293
                </p>
                <p style="font-size: 12px !important;text-align:justify">
                    Refugio Cal Pilè (adopción de perros adultos y cachorros, y adopción de gatos adultos): Ctra NII Km 648,4 08301 Mataró (Barcelona).
                    Tel. 687976037
                </p>
            </div>
            <div class="col-md-6">
                <h5 style="color: #fff !important">Horarios</h5>
                <p style="font-size: 12px !important;text-align:justify">
                    Horarios de oficinas: De lunes a viernes de 9 a 19h.
                </p>
                <p style="font-size: 12px !important;text-align:justify">
                    Horarios Servicios Veterinarios (Mataró): De lunes a sábado, de 11 a 14h y de 15 a 18h (para adopciones de 11 a 13h y de
                    15 a 17h). Domingos y festivos, de 11 a 14h (para adopciones de 11 a 13h).
                </p>
                <p style="font-size: 12px !important;text-align:justify">
                    Horarios Cal Pilé (Mataró) y CCAAC Barcelonès (Badalona): De lunes a viernes, de 11 a 14'30 y de 15 a 17h. Sábados, de 11
                    a 14'30 y de 15 a 18h. Domingos y festivos, de 11 a 14h.
                </p>
            </div>
            <div class="d-flex justify-content-center w-100">
                <a class="pr-3 pl-3" href="http://www.facebook.com/protectoramataro"><i class="fab fa-facebook-f" style="font-size: 25px;color:white"></i></a>
                <a class="pr-3 pl-3" href="https://www.instagram.com/protectoramataro/"><i class="fab fa-instagram" style="font-size: 25px;color:white"></i></a>
                <a class="pr-3 pl-3" href="https://twitter.com/protemataro"><i class="fab fa-twitter" style="font-size: 25px;color:white"></i></a>
            </div>
        </div>
    </footer>


    @yield('js_loaded')
    <!-- Popper.JS -->
    <script src="{{ asset('Bootstrap/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend/master-scripts.js') }}"></script>
</body>

</html>
