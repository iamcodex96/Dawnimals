
@extends('Plantillas.master-private')

@section('titulo', 'Login')

@section('css_propio')
    <link rel="stylesheet" href="{{ asset("css/login.css")}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection

@section('contenido')


<main class="login-container d-flex justify-content-center align-items-center">
        <div id="login-form" class="position-relative">

            <div id="logo" class="rounded-circle shadow">
                <img  class="" src="{{ asset("storage/imagenes/spam.jpg") }}" alt="">
            </div>


            <div class="card p-2 shadow" style="padding-top:120px !important;">
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Correo">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">
                                Iniciar sesión
                            </button>
                        </div>

                        <a href="#" class="btn btn-link float-right">
                            Has olvidado tu contraseña?
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection




