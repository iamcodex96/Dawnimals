@extends('backend.plantillas.master')

@section('titulo', __('backend.panel_control'))

@section('contenido')

<div class="container-fluid" id="main">
        <div class="row">
            <h2 class="col-12 col-md">{{ __('backend.panel_control') }}</h2>
            <h2 class="col-12 col-md text-right">{{ $fecha_ini }} - {{ $fecha_fin }}</h2>
        </div>
        <div class="col main">

    {{-- ************************************  DONACIONES / DONANTES  ************************************ --}}
        <div class="row">
            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card text-white h-100" id="cardDonaciones">
                    <div class="card-body">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-list fa-4x mb-3 text-left"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                <a href="{{url('/backend/donaciones')}}" class="btn mr-2 btn-secondary" id="botonDonaciones" data-toggle="tooltip" data-placement="top" title="Agregar donación"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">{{ __('backend.total_donaciones') }}</h6>
                                <h1 class="display-4">{{ number_format($total_donaciones, 2) }} €</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card text-white h-100 " id="cardDonantes">
                    <div class="card-body">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-user fa-4x mb-3"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                    <a href="{{url('/backend/donantes')}}" class="btn btn-success" id="botonDonantes" data-toggle="tooltip" data-placement="top" title="Agregar donante"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">{{ __('backend.total_donantes') }}</h6>
                                <h1 class="display-4">{{ $total_donantes }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   {{-- ************************************  GRÁFICO / RETOS  ************************************ --}}
        <div class="row mt-5 mb-5">

            <div class="col-xl-6 col-sm-6 py-2">
                <h6 class="text-uppercase">{{ __('backend.donaciones_mes') }}</h6>
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6 py-2">
                <h6 class="text-uppercase">{{ __('backend.retos_activos') }}</h6>
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="text-left col-9">
                                <i class="fa fa-flag-checkered fa-4x mb-3"></i>
                            </div>

                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">{{ __('backend.retos_dashboard') }}</h6>
                                <h1 class="display-4">{{ $retos_completados }}/{{ $retos_total }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</div>
    <hr>
{{-- ****************************************ULTIMAS DONACIONES****************************** --}}

<div class="card mt-3 mb-3 mr-3 ml-3">
        <!--Body-->
        <div class="card-body">

            <form action="" method="post">

                <div class="col-lg-12 col-md-8">
                    <div class="table-responsive" text-align="center">
                        <table class="table table-bordered table-striped">

                        <thead class=" thead-dark">

                            <tr>
                                <th class="text-center">{{ __("backend.fecha") }}</th>
                                <th class="text-center">{{ __("backend.tipo") }}</th>
                                <th class="text-center">{{ __("backend.subtipo") }}</th>
                                <th class="text-center">{{ __("backend.centro_receptor") }}</th>
                                <th class="text-center">{{ __("backend.coste") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach ($donaciones as $donacion)
                                        <td class="text-center">{{$donacion->fecha_donativo}}</td>
                                        <td class="text-center">{{$donacion->subtipos->tipos->nombre}}</td>
                                        <td class="text-center">{{ App::getLocale() == "ca" ? $donacion->subtipos->nombre_cat : $donacion->subtipos->nombre_esp }}</td>
                                        <td class="text-center">{{$donacion->centro->nombre}}</td>
                                        <td class="text-center">{{$donacion->coste}}</td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </form>
    </div>

    @endsection

    @section( 'scripts' )
        {{-- <script src="{{url( 'js/charts/jquery.min.js' )}}"></script> --}}

        <script src="{{url( 'js/charts/Chart.min.js' )}}"></script>

        <script src="{{url( 'js/charts/create-line_bar-charts.js' )}}"></script>
    @endsection



