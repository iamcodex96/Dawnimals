<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/master-public.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @yield('css_propio')
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    @yield('js_onload')
    <title>@yield("titulo")</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-transparent d-flex justify-content-end sticky-top">
        <button onclick="overlayController()" class="btn  btn-lg btn-outline-info"><i class="fas fa-bars"></i></button>
    </nav>
    <nav class="nav flex-column p-0 navegacion">

    <a href="#primero" data-toggle="tooltip" data-placement="left" title="Opcion 1" class="nav-link mt-5">O</a>
    <a href="#segundo" data-toggle="tooltip" data-placement="left" title="Opcion 2" class="nav-link mt-5">O</a>
    <a href="#tercero" data-toggle="tooltip" data-placement="left" title="Opcion 3" class="nav-link mt-5">O</a>
    <a href="#cuarto" data-toggle="tooltip" data-placement="left" title="Opcion 4" class="nav-link mt-5">O</a>
    </nav>
    <div id="overlay">

            <nav class="nav flex-column p-0 d-flex align-content-center">

                <a href="https://www.protectoramataro.org/es" class="nav-link">SPAM</a>
                <a href="https://www.protectoramataro.org/es/quienes-somos-que-hacemos" class="nav-link">Quien Somos?</a>
                <a href="https://www.protectoramataro.org/es/cercador-animals" class="nav-link">Animales</a>
                <a href="{{ url('/backend/login') }}" class="nav-link">Acceso Portal</a>

            </nav>

    </div>
    @yield('contenido')
    @yield('js_loaded')
    <!-- Popper.JS -->
    <script src="{{ asset('Bootstrap/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        var isOverlay=false;
        function overlayController(){
            if(isOverlay){
                hideOverlay();
                isOverlay=false;
            }else{
                showOverlay();
                isOverlay=true;
            }
        }
        $overlay = $('#overlay');
        function showOverlay(){
            $overlay.show("fast");
        };
        function hideOverlay(){
            $overlay.hide("fast");
        };
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
