<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield("titulo")</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{asset('css/backend/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="{{ asset('Bootstrap/js/solid.js') }}"></script>
    <script defer src="{{ asset('Bootstrap/js/fontawesome.js') }}"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('js/api/restcountries.js') }}"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>{{ __("backend.nombre_menu") }}</h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="{{asset('/backend')}}">{{ __("backend.panel_control") }}</a>

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
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">{{ __("backend.donaciones") }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{url('backend/donaciones/create')}}">{{ __("backend.donacion_añadir") }}</a>
                        </li>
                        <li>
                            <a href="{{url('/backend/donaciones')}}">{{ __("backend.donacion_buscar") }}</a>
                        </li>
                        <li>
                            <a href="#">{{__("backend.otros")}}</a>
                        </li>
                    </ul>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">{{ __("backend.donantes") }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="{{url('/backend/donantes/create')}}">{{ __("backend.donante_añadir") }}</a>
                        </li>
                        <li>
                            <a href="{{url('/backend/donantes')}}">{{ __("backend.donante_buscar") }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __("backend.otros") }}</a>
                        </li>
                    </ul>
                    <a href="#pageSubMantenimientos" data-toggle="collapse" aria-expanded="false">{{ __("backend.mantenimientos") }}</a>
                    <ul class="collapse list-unstyled" id="pageSubMantenimientos">
                        <li>
                            <a href="{{url('backend/mantenimientos/usuarios')}}">{{ __("backend.usuarios") }}</a>
                            <a href="{{url('backend/mantenimientos/perfiles')}}">{{ __("backend.perfiles") }}</a>
                            <a href="{{url('backend/mantenimientos/subtipos')}}">{{ __("backend.subtipos") }}</a>
                        </li>
                    </ul>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-dark bg-dark sticky-top d-flex justify-content-between">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div id="left-menu">
                    <div class="dropdown" style="float: left;margin-right: 10px;">
                        <button class="btn btn-secondary " type="button" id="drIdioma" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                  <span class="fa fa-globe"></span> <span class="fa fa-sort-down mb-1"></span>
                                </button>
                        <div class="dropdown-menu" aria-labelledby="drIdioma">
                            <a class="dropdown-item" href="{{ url('backend/chgIdioma/ca') }}">Català</a>
                            <a class="dropdown-item" href="{{ url('backend/chgIdioma/es') }}">Español</a>
                        </div>
                    </div>
                    <a class="btn btn-danger" href="{{ url('/backend/logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                </div>
        </div>
        </nav>

        <div class="container" style="margin-top: 100px;">
    @include('backend.partial.mensajes') @yield('contenido') @yield('modals')
        </div>



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

        @yield("scripts")
</body>

</html>
