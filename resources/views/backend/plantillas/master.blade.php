<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield("titulo")</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{asset("css/backend/dashboard.css")}}">
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
                            <a href="{{url('backend/Altadonacion')}}" >Añadir Donación</a>
                        </li>
                        <li>
                            <a href="{{url('backend/donaciones')}}">Buscar donación</a>
                        </li>
                        <li>
                            <a href="#">Otros</a>
                        </li>
                    </ul>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">Donantes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="{{url('backend/altaDonante')}}" >Añadir Donante</a>
                        </li>
                        <li>
                            <a href="{{url('backend/donantes')}}">Buscar Donante</a>
                        </li>
                        <li>
                            <a href="#">Otros</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#">Perfil de Usuario</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-dark bg-dark sticky-top">
                    <div class="float-left">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-justify"></i>
                        </button>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-danger" href="{{ url('/landing') }}"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
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
                    var sidebarActive = false;
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });
                    $('#sidebarCollapse').on('click', function() {
                        if(!sidebarActive){
                            $('#sidebar').addClass('active');
                            $('.overlay').addClass('active');
                            sidebarActive = true;
                            $('#sidebarCollapse').html('<i class="fas fa-arrow-left"></i>');
                        }else{
                            $('#sidebar').removeClass('active');
                            $('.overlay').removeClass('active');
                            sidebarActive = false;
                            $('#sidebarCollapse').html('<i class="fas fa-align-justify"></i>');
                        }
                    });
                });
            </script>
</body>

</html>
