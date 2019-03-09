@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/landing.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="">
    <div id="primero"></div>
    <div id="segundo"></div>
    <div id="tercero"></div>
    <div id="cuarto"></div>
</main>

@endsection

@section('js_loaded')
@endsection
