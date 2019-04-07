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
        <div class="">
            <img class="img-fluid" id="imgPrincipal" width="100%" height="750px" src="{{ asset('./img/login-back_ant.jpg') }}" alt="Responsive image">
        </div>
    </div>

    <div id="segundo">
        <div class="row mt-0 mr-3">

            <div class="col-md-12 texto-container mt-5">
                    <h1 text-center>¿ Quiénes Somos ?</h1>
                <div class="texto m-5">
                    <p class="m-5"> eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque. Congue ridiculus erat suspendisse diam class hac, conubia eu blandit quis curabitur velit rutrum, habitasse luctus per interdum ad.</p>
                </div>

                <div class="logoQuienes text-center">
                  <img src="{{ asset('./img/logo_OK_transparencia_2.png') }}" width="350px" alt="">
                </div>

            </div>

            <div class="col-md-12 imgParallax2" id="imghuellas">
            </div>
        </div>
    </div>

    <div class="imgParallax" id="img1">
        </div>
        </div>
    </div>
    <div id="tercero" class="p-5">
        <h1 class="">¿ Como puedo ayudar ?</h1>
        <div class="row">
            <div class="col-md-4">
                    <div class="card rounded-circle">
                        <img class="card-img-top" src="{{ asset('./img/insta001.png') }}" alt="Card image cap">
                        <h2><img src="{{ asset('./img/SPAMI_LOGO_AMOR.png') }}" width="60px" alt=""> Dona Amor</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card rounded-circle">

                        <img class="card-img-top" src="{{ asset('./img/insta002.png') }}" alt="Card image cap">
                        <h2><img src="{{ asset('./img/SPAMI_LOGO_MONEDA.png') }}" width="60px" alt=""> Dona dinero</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card rounded-circle">
                        <img class="card-img-top" src="{{ asset('./img/insta003.png') }}" alt="Card image cap">
                        <h2><img src="{{ asset('./img/SPAMI_LOGO_TIEMPO.png') }}" width="60px" alt=""> Dona Tiempo</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="imgParallax" id="img2">

    </div>
    <div id="cuarto" class="p-5">
        <h1 class="">¿ Qué necessitamos ?</h1>
        <div class="row">
                {{-- <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-center">
                                <button class="btn btn-lg w-100 shadow">
                                    <img src="{{ asset('./img/info-iconos/comida.png') }}" alt="">
                                    <p>Comida</p>
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                    <button class="btn btn-lg w-100 shadow">
                                    <img src="{{ asset('./img/info-iconos/accesorios.png') }}" alt="">
                                    <p>Accesorios</p>
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                    <button class="btn btn-lg w-100 shadow">
                                        <img src="{{ asset('./img/info-iconos/veterinario.png') }}" alt="">
                                        <p>Material Veterinario</p>
                                    </button>
                                </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                    <button class="btn btn-lg w-100 shadow">
                                    <img src="{{ asset('./img/info-iconos/encantes.png') }}" alt="">
                                    <p>Material Oficina</p>
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                    <button class="btn btn-lg w-100 shadow">
                                    <img src="{{ asset('./img/info-iconos/oficina.png') }}" alt="">
                                    <p>Dinero</p>
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                    <button class="btn btn-lg w-100 shadow">
                                    <img src="{{ asset('./img/info-iconos/monedas.png') }}" alt="">
                                    <p>Comida</p>
                                </button>
                            </div>--}}
                        </div>
                    </div>
                    <div class="col-md-6 info-necessidades"></div>
        </div>

    </div>
</main>

@endsection

@section('js_loaded')
{{-- <script src="{{ asset('./js/frontend/landing.js') }}"></script> --}}
@endsection
