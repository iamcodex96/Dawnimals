@extends('backend.plantillas.master')

@section('titulo','Usuarios')


@section('contenido')

<div class="container">
    <form action="{{ action("Backend\Mantenimientos\UsuariosController@store") }}" method="post">
        @csrf

        <div class="titulo text-center mb-3">
            <h4>ALTA USUARIO</h4>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h4>Datos</h4>
            </div>
            <div class="card-body row">
                <div class="form-group col-md-6">
                    <label for="nombre" >Nombre</label>
                    <input name="nombre" id="nombre" type="text" class="col form-control" value="{{ old("nombre") }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="nombre_usuario">Username</label>
                    <input name="nombre_usuario" id="nombre_usuario" type="text" class="col form-control" value="{{ old("nombre_usuario") }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="correo">Correo</label>
                    <input name="correo" id="correo" type="email" class="col form-control" value="{{ old("correo") }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="col form-control" value="{{ old("password") }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="role_id">Perfil</label>
                    <select name="role_id" id="role_id" class="col form-control">
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}" {{ (old("role_id")  == $rol->id) ? "selected" : "" }}>{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="botonAceptar text-center mb-5 mt-4">
            <button type="submit" class="btn btn-primary col-5">GUARDAR</button>
            <a class="btn btn-secondary col-5" href="{{ url("backend/mantenimientos/usuarios") }}">CANCELAR</a>
        </div>
    </form>
</div>
@endsection