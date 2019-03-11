<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/master-public.css') }}">
    @yield('css_propio')
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('js_onload')
    <title>@yield("titulo")</title>
</head>
<body>

    <div class="portal"><a href="{{ url('/backend/login') }}">Acceso Portal</a></div>
    <header>
        <h1>SPAM</h1>
        <h2>Protectora de Mataro</h2>
    </header>
    <nav id="topNav">
        <ul>
            <li><a href="#">Nav 1</a></li>
            <li><a href="#">Nav 2</a></li>
            <li id="spam"><img src="https://via.placeholder.com/150"></li>
            <li><a href="#">Nav 4</a></li>
            <li><a href="#">Nav 5</a></li>
        </ul>
    </nav>
    @yield('contenido')
    <script src="{{ asset('js/navbar-sticky.js') }}"></script>
    @yield('js_loaded')
</body>
</html>
