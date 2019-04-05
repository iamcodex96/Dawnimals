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
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" background="none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-black-50 text-center" id="navbarNav"><!-- d-flex justify-content-end -->
            <ul class="navbar-nav">
              <li class="nav-item active">
               <img  src="{{ asset('./img/Spami_M.png') }}" width="60px" height="60px"  alt="">
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.protectoramataro.org/es/quienes-somos-que-hacemos">Qui Som?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.protectoramataro.org/es/cercador-animals">Animals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"href="{{ url('backend/login') }}">Acceso Portal</a>
              </li>
            </ul>
          </div>
    </nav>
    <nav class="nav flex-column p-0 navegacion">
        <a href="#primero" onclick="updateIcon(0,'primero')" data-toggle="tooltip" data-placement="left" title="Opcion 1" class="nav-link mt-3"><i class="fas fa-circle"></i></a>
        <a href="#segundo" onclick="updateIcon(1,'segundo')" data-toggle="tooltip" data-placement="left" title="Opcion 2" class="nav-link mt-3"><i class="far fa-circle"></i></a>
        <a href="#tercero" onclick="updateIcon(2,'tercero')" data-toggle="tooltip" data-placement="left" title="Opcion 3" class="nav-link mt-3"><i class="far fa-circle"></i></a>
        <a href="#cuarto" onclick="updateIcon(3,'cuarto')" data-toggle="tooltip" data-placement="left" title="Opcion 4" class="nav-link mt-3"><i class="far fa-circle"></i></a>
    </nav>
    <div id="overlay">

            <nav class="nav flex-column p-0 d-flex justify-content-center">
                <a href="https://www.protectoramataro.org/es" class="nav-link text-center">SPAM</a>
                <a href="https://www.protectoramataro.org/es/quienes-somos-que-hacemos" class="nav-link text-center">Quien Somos?</a>
                <a href="https://www.protectoramataro.org/es/cercador-animals" class="nav-link text-center">Animales</a>
                <a href="{{ url('backend/login') }}" class="nav-link text-center">Acceso Portal</a>
            </nav>

    </div>
    @yield('contenido')
    @yield('js_loaded')
    <!-- Popper.JS -->
    <script src="{{ asset('Bootstrap/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend/master-scripts.js') }}"></script>
</body>
</html>
