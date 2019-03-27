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
        <div class="video">
            <iframe id="video" width="100%" height="600" src="https://www.youtube.com/embed/x92g01IsymM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div id="segundo">
        <div class="row p-5">
                <h1 class="shadow">¿ Quienes Somos ?</h1>
            <div class="col-md-6 texto-container">

                <div class="texto">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit fames litora luctus, sed inceptos quis libero justo scelerisque mauris maecenas sem at leo, ad laoreet nulla pretium sapien parturient faucibus per netus. Per class augue condimentum cubilia eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque. Congue ridiculus erat suspendisse diam class hac, conubia eu blandit quis curabitur velit rutrum, habitasse luctus per interdum ad.</p>
                </div>
                <h3>Donaciones</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit fames litora luctus, sed inceptos quis libero justo scelerisque mauris maecenas sem at leo, ad laoreet nulla pretium sapien parturient faucibus per netus. Per class augue condimentum cubilia eleifend nibh dignissim, torquent mauris purus sapien tempus cras placerat phasellus, nec etiam sodales egestas sagittis natoque.</p>
                <a href="" class="btn btn-lg"><i class="fas fa-greater-than"></i> Saber mas</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('./img/placeholder.jpg') }}">
                <button class="btn btn-lg round-button"><i class="far fa-play-circle"></i>Ver video</button>
            </div>
        </div>
    </div>
    <div id="tercero" class="p-5">
        <h1 class="shadow">¿ Como puedo ayudar ?</h1>
        <div class="row">
            <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('./img/insta001.png') }}" alt="Card image cap">
                        <h2><i class="fas fa-heart"></i> Dona Amor</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card">

                        <img class="card-img-top" src="{{ asset('./img/insta002.png') }}" alt="Card image cap">
                        <h2><i class="fas fa-coins"></i> Dona Dinero</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('./img/insta003.png') }}" alt="Card image cap">
                        <h2><i class="fas fa-hourglass"></i> Dona Tiempo</h2>
                        <div class="card-body text-center">
                            <p>Hazte Voluntario </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div id="cuarto" class="p-5">
        <h1 class="shadow">¿ Qué necessitamos ?</h1>
        <div class="row">
                <div class="col-md-6">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 info-necessidades"></div>
        </div>

    </div>
</main>

@endsection

@section('js_loaded')
<script src="{{ asset('./js/frontend/landing.js') }}"></script>
@endsection
