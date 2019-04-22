@extends('frontend.plantillas.master')
@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/challenges.css') }}">
@endsection

@section('titulo') {{ __("frontend.nuestros_retos") }}
@endsection

@section('contenido')

<div class="container">
        <img src="{{ asset('img/banner-challenge.png') }}" class="img-fluid" alt="Responsive image">
        <h1 style="position: relative;left: -476px;top: -65px; text-align:center"id="typer"></h1>
    </div>
<div id="cuarto" class="p-5">
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
        var typer = $('#typer');
        var txt = '{{__("frontend.nuestros_retos")}}';
        var textoAmostrar='';
        var speed = 50;
        var i=0;
        var j=0;
        typerEffect();

    function typerEffect(){
        if (i < txt.length){
            textoAmostrar+= txt.charAt(i)
            typer.html(textoAmostrar);
            i++;
            setTimeout(typerEffect, speed);
        }
    };
    </script>
@endsection
