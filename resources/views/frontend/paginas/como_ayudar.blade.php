@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/quien-somos.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/como-ayudar.css') }}">
<style>
.hideme{
    opacity: 0;
}
.btn-spam{
    position: relative;
    left: 20%;
    display: flex;
    align-items: center;
    justify-content: center;
    outline-width: 0px !important;
    user-select: auto !important;
    font-size: 30px;
    height: 100px;
    width: 60%;
    background-color: #636;
    color: white;
}
.btn-spam:hover{
    color: white;
}
</style>
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="container-fluid">
        {{-- <img src="{{ asset('img/quien-somos/img-quien-somos-8.png') }}" class="img-fluid" alt="Responsive image"> --}}
        <div class="text-center mt-5 mb-3">
                <h1 id="typer"></h1>
        </div>

        <div class="col-12 text-center video-links2" height="1000px">

            <div class="col-12 text-center video-links">
                    <a  class="btn  botonVideo" data-start="4" data-end="64" id="intro" href="#" role="button">DATOS</a>
                    <a  class="btn  botonVideo" data-start="65" data-end="125" id="adopcion" href="#" role="button">ADOPCIÓN</a>
                    <a  class="btn  botonVideo" data-start="126" data-end="189" id="donacion" href="#" role="button">DONACIÓN</a>
                    <a  class="btn  botonVideo" data-start="190" data-end="500" id="voluntario"href="#"  role="button">VOLUNTARIO</a>
                    <a  class="btn  botonVideo" data-start="4" data-end="500" id="todo" href="#" role="button">VER TODO</a>
                </div>
            </div>

        <div id="video" class="d-flex justify-content-center">

                <div class="video-controls">
                        <i class="fas fa-play"></i>
                </div>


                <video id="myVideo"class="embed-responsive" width="1280" height="720"  type="video/mp4">

                        <source src="{{ asset('./videos/SPAM_videoInteractivo.mp4') }}">
                                Your browser does not support HTML5 video.
                </video>

            </div>

    <div class="text-center m-5 hideme">
        <h1>{{__("frontend.how-dona-amor")}}</h1>
        <h4>{{__("frontend.how-text-amor")}}</h4>
    </div>
    <div class="row p-5">
        <div class="col-md-6 hideme">
                <img src="{{ asset('img/quien-somos/wooooh.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-md-6">
            <h2>{{__("frontend.how-requisitos")}}</h2>
            <p>{{__("frontend.how-requisitos-txt")}}</p>
            <h2>{{__("frontend.how-coste")}}</h2>
            <p>{{__("frontend.how-coste-txt01")}}
            <br>{{__("frontend.how-coste-txt02")}}
            <br>{{__("frontend.how-coste-txt03")}}
            <br>{{__("frontend.how-coste-txt04")}}
            <br>{{__("frontend.how-coste-txt05")}}
            <br>{{__("frontend.how-coste-txt06")}}
            <br>{{__("frontend.how-coste-txt07")}}
            </p>
            <a href="https://www.protectoramataro.org/ca/cercador-animals" class="btn btn-lg btn-spam">{{__("frontend.how-dona-amor-adopta")}}</a>
        </div>
    </div>
    <hr>
    <div class="text-center m-5 hideme">
            <h1>{{__("frontend.how-dona-tiempo")}}</h1>
            <h4>{{__("frontend.how-dona-tiempo-texto")}}</h4>
        </div>
        <div class="row p-5">
            <div class="col-md-6 hideme">
                <h2>{{__("frontend.how-voluntario")}}</h2>
                <p>{{__("frontend.how-voluntario-txt01")}}</p>
                <p>{{__("frontend.how-voluntario-txt02")}}</p>
            </div>
            <div class="col-md-6">
                    <img src="{{ asset('img/quien-somos/happy.jpg') }}" class="img-fluid hideme" alt="Responsive image">
            </div>
        </div>
        <hr>
    <div class="text-center m-5 hideme">
        <h1>{{__("frontend.how-dona-dinero")}}</h1>
        <h4>{{__("frontend.how-dona-dinero-txt")}}</h4>
    </div>
    <div class="row p-5">
        <div class="col-md-6 hideme">
                <img src="{{ asset('img/quien-somos/antua-pics-01.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-md-6">
            <div style="position: relative; top: 15%; color:white">
                <a href="https://www.facebook.com/protectoramataro" class="btn btn-lg btn-primary m-1 w-100 hideme"><i class="fab fa-facebook-f"></i>{{__("frontend.how-facebook")}}</a>
                <a href="" class="btn btn-lg btn-success m-1 w-100 hideme"><i class="fas fa-hand-holding-usd"></i>{{__("frontend.how-grano")}}</a>
                <a href="https://www.protectoramataro.org/es/necesitamos-socios" class="btn btn-lg btn-dark m-1 w-100 hideme"><i class="fas fa-hand-holding-usd"></i>{{__("frontend.how-socio")}}</a>
                <a href="" class="btn btn-lg btn-warning m-1 w-100 hideme"><i class="fas fa-hand-holding-usd"></i>{{__("frontend.how-padrino")}}</a>
                <a href="" class="btn btn-lg btn-secondary m-1 w-100 hideme"><i class="fas fa-hand-holding-usd"></i>{{__("frontend.how-teaming")}}</a>
            </div>
        </div>
    </div>
</main>

@endsection

@section('js_loaded')
{{-- <script src="{{ asset('./js/frontend/landing.js') }}"></script> --}}
<script src="{{ asset('./js/frontend/video.js') }}"></script>
<script>
    var typer = $('#typer');
    var txt = '{{__("frontend.toggle_ayudar")}}';
    var textoAmostrar='';
    var speed = 50;
    var i=0;
    var j=0;
    typerEffect();

    $(document).ready(function() {
        $(window).scroll( function(){
                $('.hideme').each( function(i){

                    var bottom_of_object = $(this).offset().top + $(this).outerHeight();
                    var bottom_of_window = $(window).scrollTop() + $(window).height();

                    if( bottom_of_window+200 > bottom_of_object ){

                        $(this).animate({'opacity':'1'},500);

                    }

                });

            });

        });


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
