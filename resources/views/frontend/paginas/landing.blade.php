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

        <div class="imgParallax" id="background1">
                <div id="segundo">
                        <div class="row mt-0 mr-3">
                                <div class="col-md-6 texto-container mt-5">  </div>
                            <div class="col-md-6 texto-container mt-5">
                                <div class="texto m-5">
                                    <p class="m-5 landingText"> eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque. Congue ridiculus erat suspendisse diam class hac, conubia eu blandit quis curabitur velit rutrum, habitasse luctus per interdum ad.</p>
                                </div>

                                <div class="logoQuienes text-center">
                                  <img src="{{ asset('./img/logo_OK_transparencia_2.png') }}" width="350px" alt="">
                                </div>

                            </div>
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
        <div class="row">

                        </div>
                    </div>
                    <div class="col-md-6 info-necessidades"></div>
        </div>
        <div class="imgParallax" id="img2">

            </div>
    </div>
</main>

@endsection

@section('js_loaded')
{{-- <script src="{{ asset('./js/frontend/landing.js') }}"></script> --}}
@endsection
