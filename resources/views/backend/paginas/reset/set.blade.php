@extends('backend.plantillas.account')
@section('titulo', 'Login')
@section('css_propio')
@endsection

@section('contenido')

<form action="{{ action('Backend\AccountController@setNewPassword', ['token' => $token]) }}" method="post">
    @csrf
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-user"></span>
                </div>
            </div>
            <input type="text" class="form-control" name="correo" id="correo" value="{{ $correo }}" placeholder='{{ __("backend.correo")}}' disabled>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>
            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder='{{ __("backend.password")}}'>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>
            <input type="password" class="form-control" name="repeat_password" id="repeat_password" value="{{ old('repeat_password') }}" placeholder='{{ __("backend.repite_password")}}'>
        </div>
    </div>

    <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-lg btn-primary">
                {{ __("backend.guardar_password")}}
        </button>
    </div>
</form>
@endsection
