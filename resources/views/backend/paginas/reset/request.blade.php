@extends('backend.plantillas.account')
@section('titulo', 'Login')
@section('css_propio')
@endsection

@section('contenido')

<form action="{{ action('Backend\AccountController@sendResetPassword') }}" method="post">
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

    <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-lg btn-primary">
                {{ __("backend.enviar_peticion")}}
        </button>
        <a href="{{ action('Backend\AccountController@index')}}" class="btn btn-lg btn-secondary">
            {{ __("backend.cancelar")}}
        </a>
    </div>
</form>

@endsection
