@extends('backend.plantillas.master')

@section('titulo','SPAM Panel de control')

@section('contenido')

<div class="container-fluid" id="main">
   <h2>Panel de control</h2>
        <div class="col main">

    {{-- ************************************  DONACIONES / DONANTES  ************************************ --}}
        <div class="row">
            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card text-white bg-success h-100">
                    <div class="card-body bg-success">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-list fa-4x mb-3 text-left"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                <a href="" class="btn btn-secondary mr-2" data-toggle="tooltip" data-placement="top" title="Agregar donación"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">Total donaciones</h6>
                                <h1 class="display-4">2000€</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card text-white bg-secondary h-100">
                    <div class="card-body bg-secondary">
                        <div class="row">
                            <div class="text-left col-9">
                                <i class="fa fa-user fa-4x mb-3"></i>
                            </div>
                                <div class="botonAdd col-3 text-right">
                                    <a href="" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Agregar donante"> <i class="fa fa-plus fa-2x"></i> </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">Donantes</h6>
                                <h1 class="display-4">134</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   {{-- ************************************  GRÁFICO / RETOS  ************************************ --}}
        <div class="row mt-5 mb-5">

            <div class="col-xl-6 col-sm-6 py-2">
                <h6 class="text-uppercase">Donaciones del mes</h6>
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-6 py-2">
                <h6 class="text-uppercase">Retos Activos</h6>
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="text-left col-9">
                                <i class="fa fa-flag-checkered fa-4x mb-3"></i>
                            </div>

                            <div class="row">
                                <div class="izquierda text-left col-10">
                                <h6 class="text-uppercase">Retos (Completados / Activos)</h6>
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
                                <th class="text-center">ID</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Subtipo</th>
                                <th class="text-center">Centro Receptor</th>
                                <th class="text-center">Coste</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach ($donaciones as $donacion)

                                        <td class="text-center">{{$donacion->id}}</td>
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
        <script src="{{url( 'js/charts/jquery.min.js' )}}"></script>

        <script src="{{url( 'js/charts/Chart.min.js' )}}"></script>

        <script src="{{url( 'js/charts/create-line_bar-charts.js' )}}"></script>
    @endsection



