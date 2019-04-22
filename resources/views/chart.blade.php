@extends('frontend.plantillas.master')
@section('titulo','CHART')
@section('contenido')
<br>
<div class="container">
    <!-- Bar and Line Chart -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Donaciones del mes </div>
        <div class="card-body">
            <div id="groupFechasTipos" class="form-group row">
                    <div class="col-xl-4 m-auto">
                        <label for="fechaInicioTipos" class="">De: </label>
                        <input type="month" name="fechaInicioTipos" id="fechaInicioTipos" class="form-control d-inline" value="2018-04">
                    </div>

                    <div class="col-xl-4 m-auto">
                        <label for="fechaFinalTipos" class="d-inline">Hasta: </label>
                        <input type="month" name="fechaFinalTipos" id="fechaFinalTipos" class="form-control" value="2019-04">
                    </div>
                </div>
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
    </div>

    <!-- Donut Chart -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Donaciones por animal </div>
        <div class="card-body">
            <canvas id="doughnutChar" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-area-chart"></i> Donaciones por animal </div>
        <div class="card-body">
            <canvas id="polarAreaChar" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
    </div>


</div>


@endsection

@section( 'js_loaded' )
<script src="{{url( 'js/charts/jquery.min.js' )}}"></script>

<script src="{{url( 'js/charts/Chart.min.js' )}}"></script>

<script src="{{url( 'js/charts/create-line_bar-charts.js' )}}"></script>
<script src="{{url( 'js/charts/create-doughnut-chart.js' )}}"></script>
<script src="{{url( 'js/charts/create-polar-area-chart.js' )}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    @endsection
