<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield("titulo")</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" href="{{asset('css/backend/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="{{ asset('Bootstrap/js/solid.js') }}"></script>
    <script defer src="{{ asset('Bootstrap/js/fontawesome.js') }}"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{ asset('Bootstrap/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('js/api/restcountries.js') }}"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                    <img src="{{ asset('./img/logo_OK_transparencia_2.png') }}" width="200px" alt="">
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="{{asset('/backend')}}">{{ __("backend.panel_control") }}</a>

                </li>
                <li>
                        <a href="{{url('/backend/donaciones')}}">{{ __("backend.donaciones") }}</a>

                        <a  href="{{url('/backend/donantes')}}">{{ __("backend.donantes") }}</a>



                    @if(Auth::user()->admin)
                        <a href="#pageSubMantenimientos" data-toggle="collapse" aria-expanded="false">{{ __("backend.mantenimientos") }}</a>
                        <ul class="collapse list-unstyled" id="pageSubMantenimientos">
                            <li>
                                <a href="{{url('backend/mantenimientos/usuarios')}}">{{ __("backend.usuarios") }}</a>
                                <a href="{{url('backend/mantenimientos/subtipos')}}">{{ __("backend.subtipos") }}</a>
                                <a href="{{url('backend/mantenimientos/challenges')}}">{{ __("backend.challenges") }}</a>
                            </li>
                        </ul>
                    @endif
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
                        <button class="btn btn-secondary " type="button" id="drIdioma" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    $(".fecha").datepicker({
                        format: 'dd/mm/yyyy',
                    });

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
