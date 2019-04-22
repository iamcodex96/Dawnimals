@extends('backend.plantillas.account')
@section('titulo', 'Login')
@section('css_propio')
@endsection

@section('contenido')


<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" placeholder='{{ __("backend.correo")}}'>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>
            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
        </div>
    </div>

    <div class="form-group text-center mt-4">
        <a class="btn btn-lg btn-primary" href="{{ url('/') }}"><i class="fas fa-sign-out-alt fa-flip-horizontal volverPublica"></i></a>

        <button type="submit" class="btn btn-lg btn-primary">
                {{ __("backend.iniciar_sesion")}}
        </button>


    </div>

    <a href="{{ route('requestReset') }}" class="btn btn-link float-right">
            {{ __("backend.pregunta_contraseña")}}
        </a>
</form>
@endsection
