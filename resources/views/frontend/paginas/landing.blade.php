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
            <div class="col-md-6 texto-container">
                <h1>¿ Quienes Somos ?</h1>
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
        <h1>¿ Como puedo ayudar ?</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
            </div>
        </div>
    </div>
    <div id="cuarto"></div>
</main>

@endsection

@section('js_loaded')
<script src="{{ asset('./js/frontend/landing.js') }}"></script>
@endsection
