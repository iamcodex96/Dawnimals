<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SPAM panel de control</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/Dawnimals/public/css/dashboard.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="{{ asset('Bootstrap/js/solid.js') }}"></script>
    <script defer src="{{ asset('Bootstrap/js/fontawesome.js') }}"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.slim.min.js') }}"></script>


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Donaciones SPAM</h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                <a href="{{asset('/backend')}}">Panel de control</a>
                   
                   <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Graficos</a>
                        </li>
                        <li>
                            <a href="#">Otro</a>
                        </li>
                        <li>
                            <a href="#">Otro</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Donaciones</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Materiales</a>
                        </li>
                        <li>
                            <a href="#">Monetarias Mensuales</a>
                        </li>
                        <li>
                            <a href="#">Otros</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('donantes')}}">Donantes</a>
                </li>
                <li>
                    <a href="#">Perfil de Usuario</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menú</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Cerrar Sesión</a>
                    </li>
                </ul>
            </nav>

            @yield('contenido')


            <!-- Popper.JS -->
            <script src="{{ asset('Bootstrap/js/popper.min.js') }}"></script>
            <!-- Bootstrap JS -->
            <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
            <!-- jQuery Custom Scroller CDN -->
            <script src="{{ asset('Bootstrap/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#dismiss, .overlay').on('click', function() {
                        $('#sidebar').removeClass('active');
                        $('.overlay').removeClass('active');
                    });

                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').addClass('active');
                        $('.overlay').addClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });
            </script>
</body>

</html> 