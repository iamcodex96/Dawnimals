<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allfa.min.css') }}">
    @yield('css_propio')

    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/allfa.min.js') }}"></script>
    @yield('js_onload')

    <title>@yield('titulo')</title>
</head>

<body>
    @yield('contenido')
</body>

</html>
