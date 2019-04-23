@extends('frontend.plantillas.master')
@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/challenges.css') }}">
@endsection

@section('titulo') Landing
@endsection

@section('contenido')
<nav class="nav flex-column p-0 navegacion">
<a href="#primero" onclick="updateIcon(0,'primero')" data-toggle="tooltip" data-placement="left" title="{{__("frontend.home")}}" class="nav-link mt-3"><i class="fas fa-circle"></i></a>
    <a href="#segundo" onclick="updateIcon(1,'segundo')" data-toggle="tooltip" data-placement="left" title="{{__("frontend.toggle_ayudar")}}" class="nav-link mt-3"><i class="far fa-circle"></i></a>
    <a href="#tercero" onclick="updateIcon(2,'tercero')" data-toggle="tooltip" data-placement="left" title="{{__("frontend.estadisticas")}}" class="nav-link mt-3"><i class="far fa-circle"></i></a>
    <a href="#cuarto" onclick="updateIcon(3,'cuarto')" data-toggle="tooltip" data-placement="left" title="{{__("frontend.nuestros_retos")}}" class="nav-link mt-3"><i class="far fa-circle"></i></a>
</nav>



<main data-spy="scroll" data-target="#list-opciones" class="container-fluid">

<div id="primero" class="container-fluid" id="containerVideo">

    <div align="center" class="embed-responsive embed-responsive-16by9">

        <video autoplay muted loop id="myVideo"class="embed-responsive-item">

            <source src="{{ asset('./videos/versionWebSPAM.mp4') }}">
                    Your browser does not support HTML5 video.
        </video>

    </div>

    <div class="container-fluid h-100">
    		<div>
                    <section id="huellaVideo" data-toggle="tooltip" data-placement="top" title= "{{__("frontend.toggle_ayudar")}}" >
                            <a href="#segundo"><i class="fas fa-paw fa-rotate-180 fa-4x" id="botonBajar"></i></a>
                    </section>
    		</div>
    </div>


</div>

    <div id="segundo" class="p-5">
        <h1 class="" z-index="-1">{{__("frontend.toggle_ayudar")}}</h1>



        <h3 class="texto-container text-center mb-5" z-index="-1">{{__("frontend.textoComoayudar")}}</h3>

        <div class="row">
            <div class="col-md-4 col-xs-10">
                <div class="card rounded-circle">
                    <img class="card-img-top" src="{{ asset('./img/insta001.png') }}" alt="Card image cap">
                    <h3 class="text-center"> {{__("frontend.donaAmor")}}</h3>
                    <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_AMOR.png') }}" width="70px" alt=""></div>

                </div>
            </div>
            <div class="col-md-4 col-xs-10">
                <div class="card rounded-circle" href="">
                    <img class="card-img-top" src="{{ asset('./img/insta002.png') }}" alt="Card image cap">
                    <h3 class="text-center"> {{__("frontend.donaDinero")}}</h3>
                    <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_MONEDA.png') }}" width="70px" alt=""></div>
                </div>
            </div>
            <div class="col-md-4 col-xs-10">
                <div class="card rounded-circle">
                    <img class="card-img-top" src="{{ asset('./img/insta003.png') }}" alt="Card image cap">
                    <h3 class="text-center">{{__("frontend.donaTiempo")}}</h3>
                    <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_TIEMPO.png') }}" width="70px" alt=""></div>
                </div>
            </div>
        </div>


        <div class="col-md-12 text-center mt-5">
            <a class="btn botonIrA" href="{{ url('/como_ayudar') }}" role="button">{{__("frontend.irAComoAyudar")}}</a>
        </div>

    </div>

    <div id="tercero" class="p-5">
        <h1 class="">{{__("frontend.tituloNuestrasDonaciones")}}</h1>
        <h3 class="texto-container text-center mb-5">{{__("frontend.textoNuestrasDonaciones")}}</h3>

        <div class="row">

            <div class="col-md-6 col-sm-12 quesito">

                <!-- Area Chart -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i> Donaciones del mes </div>
                        <div class="card-body">
                                <div id="groupFechasTipos" class="form-group row">
                                      <div class="col-xl-4 m-auto">
                                          <label for="fechaInicioTipos" class="">De: </label>
                                          <input type="month" name="fechaInicioTipos" id="fechaInicioTipos" class="form-control d-inline" value="{{ \Carbon\Carbon::now()->subYears(1)->format('Y-m')}}">
                                      </div>

                                      <div class="col-xl-4 m-auto">
                                          <label for="fechaFinalTipos" class="d-inline">Hasta: </label>
                                          <input type="month" name="fechaFinalTipos" id="fechaFinalTipos" class="form-control" value="{{date('Y-m')}}">
                                      </div>
                                  </div>
                              <canvas id="myAreaChart" width="100%" data-upd="0" height="30"></canvas>
                          </div>

                </div>

            </div>

            <div class="col-md-6 col-sm-12 line">
                <!-- Area Chart -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-area-chart"></i> Donaciones por animal </div>
                    <div class="card-body">
                        <canvas id="doughnutChar" width="100%" height="43"></canvas>
                    </div>
                    {{--  <div class="card-footer small text-muted">Updated yesterday at @php echo date('F j, Y', time() )
@endphp</div>  --}}
                </div>
            </div>

            <div class="col-md-12 text-center mt-5">
                <a name="" id="" class="btn botonIrA" href="{{ url('/estadisticas') }}" role="button">{{__("frontend.irAEstadisticas")}}</a>
            </div>
        </div>


    </div>
    <div class="imgParallax" id="img2"></div>
    <div id="cuarto" class="p-5">
        <h1 class="">{{ __("frontend.nuestros_retos") }}</h1>
        <h3 class="texto-container text-center mb-5">{{ __('frontend.retos_participa') }}</h3>
        <div class="container">

                @component('frontend.componentes.challenges', ['retos' => $retos, 'isAnterior' => false]) @endcomponent
        </div>

        <div class="col-md-12 text-center mt-5">
            <a name="" id="" class="btn botonIrA" href="{{ url('/challenges') }}" role="button">{{__("frontend.irARetos")}}</a>
        </div>
    </div>
</main>


@endsection

@section('js_loaded') {{--
<script src="{{ asset('./js/frontend/landing.js') }}"></script> --}}
<script src="{{url( 'js/charts/jquery.min.js' )}}"></script>

<script src="{{url( 'js/charts/Chart.min.js' )}}"></script>

<script src="{{url( 'js/charts/create-line_bar-charts.js' )}}"></script>
<script src="{{url( 'js/charts/create-doughnut-chart.js' )}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="{{url( 'js/huella.js' )}}"></script>


@endsection
