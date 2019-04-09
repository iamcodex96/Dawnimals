@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main data-spy="scroll" data-target="#list-opciones" class="container-fluid">
    <div id="primero">

        <div class="imgParallax3" id="background1">
                <div id="segundo">
                        <div class="row mt-0 mr-3">
                            <div class="col-md-5 texto-container mt-5">
                                <div class="texto">
                                    <p class="m-5 landingText">Gestionamos centros de acogida con una filosofía proteccionista, luchamos por la vida de los animales y trabajamos día tras día para evitar su sufrimiento. Nuestra tarea también es divulgativa: concienciamos a la sociedad sobre la tenencia responsable de los animales de compañía, los derechos de los animales, los beneficios de la adopción y una buena convivencia entre los animales y los ciudadanos</p>
                                    <p class="m-5 landingText">¿Nos ayudas?</p>
                                </div>

                                <div class="logoQuienes text-center">
                                  <img src="{{ asset('./img/logo_OK_transparencia_2.png') }}" width="350px" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 texto-container mt-5">  </div>
                        </div>
                    </div>
        </div>
    </div>

    <div class="intermedio">
    <div class="col-md-12 col-sm-0 imgParallax2" id="imghuellas">
    </div>


    </div>

    {{-- <div class="imgParallax" id="img1">
        </div> --}}
        </div>
    </div>
    <div id="tercero" class="p-5">
        <h1 class="" z-index= "-1">¿ Como puedes ayudar ?</h1>

        <h2 class="texto-container text-center mb-5" z-index= "-1">eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque. Congue ridiculus erat suspendisse diam class hac, conubia eu blandit quis curabitur velit rutrum, habitasse luctus per interdum ad.</h2>
        <div class="row">
            <div class="col-md-4">
                    <div class="card rounded-circle">
                        <img class="card-img-top" src="{{ asset('./img/insta001.png') }}" alt="Card image cap">
                        <h2 class="text-center"> Dona amor</h2>
                        <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_AMOR.png') }}" width="70px" alt=""></div>

                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card rounded-circle">
                        <img class="card-img-top" src="{{ asset('./img/insta002.png') }}" alt="Card image cap">
                        <h2 class="text-center"> Dona dinero</h2>
                        <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_MONEDA.png') }}" width="70px" alt=""></div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card rounded-circle">
                        <img class="card-img-top" src="{{ asset('./img/insta003.png') }}" alt="Card image cap">
                        <h2 class="text-center"> Dona tiempo</h2>
                        <div class="text-center pb-3"><img src="{{ asset('./img/SPAMI_LOGO_TIEMPO.png') }}" width="70px" alt=""></div>
                    </div>
            </div>
        </div>

    </div>

    <div id="cuarto" class="p-5">
        <h1 class="">Nuestras donaciones</h1>
        <h2 class="texto-container text-center mb-5">eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque. Congue ridiculus erat suspendisse diam class hac, conubia eu blandit quis curabitur velit rutrum, habitasse luctus per interdum ad.</h2>

        <div class="row">

                <div class="col-md-6 col-sm-12 quesito">
                    <img  src="{{ asset('./img/quesito.png') }}" width="800px" alt="">
                </div>

                <div class="col-md-6 col-sm-12 line">
                        <img  src="{{ asset('./img/line.png') }}" width="850px" alt="">
                </div>

                <div class="col-md-12 text-center mb-5">
                    <a name="" id="" class="btn btn-primary" href="#" role="button">DONACIONES</a>
                </div>
        </div>


    </div>
    <div class="imgParallax" id="img2"></div>
    <div id="quinto" class="p-5">
        <h1 class="">{{ __("frontend.nuestros_retos") }}</h1>
        <h2 class="texto-container text-center mb-5">Participa en nuestros retos y ayudanos a cumplir nuestra meta :).</h2>
        <div class="container">
            <div class="row">
                @foreach($retos as $reto)
                    <div class="col-12 d-flex justify-content-between">
                        <h4 style="width:110px">0 {{ $reto->subtipo->tipo_unidad}}</h4>
                        <h4>{{ $reto->subtipo->nombre_cat }}</h4>
                        <h4 style="width:110px" class="text-right">{{ $reto->objetivo }} {{ $reto->subtipo->tipo_unidad}}</h4>
                    </div>
                    <div class="col-12  mb-4">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ ($reto->cantidad / $reto->objetivo) * 100 }}%" aria-valuenow="{{ $reto->cantidad }}" aria-valuemin="0" aria-valuemax="{{ $reto->objetivo }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection

@section('js_loaded')
{{-- <script src="{{ asset('./js/frontend/landing.js') }}"></script> --}}
@endsection
