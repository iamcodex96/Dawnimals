<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allfa.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/login.css')}}">
    @yield('css_propio')

    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/allfa.min.js') }}"></script>
    @yield('js_onload')

    <title>@yield('titulo')</title>
</head>

<body>
    <main class="login-container d-flex justify-content-center align-items-center">
        <div id="login-form" class="position-relative">

            <div id="logo" class="rounded-circle shadow">
                <img src="{{ asset('img/spam.jpg') }}">
            </div>

            <div class="card p-2 shadow" style="padding-top:120px !important;">
                <div class="card-body">
                    @include('backend.partial.mensajes')
                    @yield("contenido")
                </div>
            </div>
        </div>
    </main>
</body>

</html>
