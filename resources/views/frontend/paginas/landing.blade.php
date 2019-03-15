@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="container-fluid m-0">
    <div id="primero">
        <h1>SPAMÑITA</h1>
        <hr>
        <div class="row d-flex align-content-center justify-content-center">
            <div class="card col-md-3 m-2">
                <div class="card-header"><h1>Recaudacion Mensual</h1></div>
                <div class="card-body">
                    <h4 class="card-title">Donaciones</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
            <div class="card col-md-3 m-2">
                <div class="card-header"><h1>Comida recaudada</h1></div>
                <div class="card-body">
                    <h4 class="card-title">Donantes</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
            <div class="card col-md-3 m-2">
                <div class="card-header"><h1>Mediante donaciones</h1></div>
                <div class="card-body">
                    <h4 class="card-title">Articulos</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        </div>

    </div>
    <div id="segundo">
        <h1>TRANSPARENCIA</h1>
        <hr>

    </div>
    <div id="tercero"></div>
    <div id="cuarto"></div>
</main>

@endsection

@section('js_loaded')
@endsection
