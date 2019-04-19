@extends('frontend.plantillas.master')
@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/challenges.css') }}">
@endsection

@section('titulo') {{ __("frontend.nuestros_retos") }}
@endsection

@section('contenido')

<div id="cuarto" class="p-5">
    <h1 class="">{{ __("frontend.nuestros_retos") }}</h1>
    <h2 class="texto-container text-center mb-5">{{ __('frontend.retos_participa') }}</h2>
    <div class="container">

        @component('frontend.componentes.challenges', ['retos' => $retos, 'isAnterior' => false]) @endcomponent

        <div class="row">
            <h3 class="col">{{ __('frontend.anteriores') }}</h3>
            <button class="btn" id="btnMuestraAnteriores"><span class="fa fa-chevron-down"></span></button>
            <div class="col"></div>
        </div>
        <hr class="mt-0">
        <div class="collapse" id="challenges-anteriores">
            @component('frontend.componentes.challenges', ['retos' => $retosAcabados, 'isAnterior' => true]) @endcomponent
        </div>
    </div>
</div>
@endsection

@section('js_loaded')
    <script src="{{ asset('js/utility.js') }}"></script>
    <script>
        $("#btnMuestraAnteriores").on('click', function(){
            $("#challenges-anteriores").collapse('toggle');

            swichClass($("#btnMuestraAnteriores .fa"), "fa-chevron-down", "fa-chevron-up");
        });
    </script>
@endsection
