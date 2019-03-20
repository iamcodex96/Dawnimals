@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="container-fluid m-0 p-0">
    <div id="primero">
        <h1>SPAM</h1>
        <hr>
        <div class="row d-flex align-content-center justify-content-center">
            <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h1>Estadisticas</h1>
                        </div>
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
