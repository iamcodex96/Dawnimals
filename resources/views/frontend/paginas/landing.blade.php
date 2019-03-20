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
