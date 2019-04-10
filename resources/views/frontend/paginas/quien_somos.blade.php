@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/quien-somos.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="container-fluid">
    <img src="{{ asset('img/quien-somos/img-quien-somos-1.png') }}" class="img-fluid" alt="Responsive image">
    <hr>
    <div class="p-5">
        <div id="spam" class="row">
            <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('img/quien-somos/img-quien-somos-2.png') }}" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/quien-somos/img-quien-somos-3.png') }}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/quien-somos/img-quien-somos-4.png') }}" alt="Third slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/quien-somos/img-quien-somos-5.png') }}" alt="fourth slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
            </div>
            <div class="col-md-6 info">
                <h1>{{__("frontend.who-nombre")}} <span>(SPAM)</span></h1>
                <p>{{__("frontend.who-spam")}}</p>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
                <div class="col-md-6 info">
                    <h1>{{__("frontend.who-actividades")}}</h1>
                    <h5>- {{__("frontend.who-recogida")}}</h5>
                    <p>{{__("frontend.who-recogida-desc")}}</p>
                    <h5>- {{__("frontend.who-gestion")}}</h5>
                    <p>{{__("frontend.who-gestion-desc")}}</p>
                    <h5>- {{__("frontend.who-fomento")}}</h5>
                    <p>{{__("frontend.who-fomento-desc")}}</p>
                    <h5>- {{__("frontend.who-sensibilizacion")}}</h5>
                    <p>{{__("frontend.who-sensibilizacion-desc")}}</p>
                </div>
                <div class="col-md-6 info">
                        <img src="{{ asset('img/quien-somos/img-quien-somos-7.png') }}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
    </div>
    <hr>
    <div id="video" class="d-flex justify-content-center">
            <iframe width="1280" height="720" src="https://www.youtube.com/embed/qRdSLZ5UmSE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <hr>
    <h1 class="pl-5 mt-5">{{__("frontend.who-junta")}}</h1>
    <div id="empleados" class="row p-5 d-flex justify-content-center">
        <div class="card m-3">
            <div class="card-body">
                <div class="em-color">
                    <img src="" alt="">
                </div>
                <img class="foto rounded-circle m-0" class="rounded-circle"src="{{ asset('img/quien-somos/presidenta.jpg') }}">
                <div class="card-info mt-5">
                    <h3>{{__("frontend.who-presidenta")}}</h3>
                    <h5>Sílvia Serra Lafarga</h5>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="em-color"></div>
                <img class="foto rounded-circle m-0" class="rounded-circle"src="{{ asset('img/quien-somos/antua.jpg') }}">
                <div class="card-info mt-5">
                    <h3>{{__("frontend.who-social")}}</h3>
                    <h5>Antonio Rubio Bautista</h5>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="em-color"></div>
                <img class="foto rounded-circle m-0" class="rounded-circle"src="{{ asset('img/quien-somos/nuria.jpg') }}">
                <div class="card-info mt-5">
                    <h3>{{__("frontend.who-vpresidenta")}}</h3>
                    <h5>Núria Garcia i Amat</h5>
                </div>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="em-color"></div>
                <img class="foto rounded-circle m-0" class="rounded-circle"src="{{ asset('img/quien-somos/tresorera.jpg.png') }}">
                <div class="card-info mt-5">
                    <h3>{{__("frontend.who-tresorera")}}</h3>
                    <h5>Marta Masmitjà Prada</h5>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('js_loaded')
<script src="{{ asset('./js/frontend/landing.js') }}"></script>
<script>
    var $spam = $('#spam');
    console.log($spam.position().top);
    $(window).scroll(function(){
        console.log($(this).scrollTop());
    })

    function showOnScroll(divId){
        var divMostrar = $('#'+divId);
    }

</script>
@endsection
