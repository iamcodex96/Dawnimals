@extends('backend.plantillas.m_edit')
@section('titulo','EDITAR USUARI')
@section('url-index', url("backend/mantenimientos/usuarios"))

@section('url-form', action("Backend\Mantenimientos\UsuariosController@update", ["id" => $usuario->id ]))
@section('m_contenido')

<div class="form-group col-md-6">
    <label for="nombre">Nombre</label>
    <input name="nombre" id="nombre" type="text" class="col form-control" value="{{ $usuario->nombre }}">
</div>

<div class="form-group col-md-6">
    <label for="nombre_usuario">Username</label>
    <input name="nombre_usuario" id="nombre_usuario" type="text" class="col form-control" value="{{ $usuario->nombre_usuario }}">
</div>

<div class="form-group col-md-6">
    <label for="correo">Correo</label>
    <input name="correo" id="correo" type="email" class="col form-control" value="{{ $usuario->correo }}">
</div>

<div class="form-group col-md-6">
    <label for="password">Password</label>
    <input name="password" id="password" type="password" class="col form-control" value="{{ old(" password ") }}">
</div>

<div class="form-group col-md-6">
    <label for="role_id">Perfil</label>
    <select name="role_id" id="role_id" class="col form-control">
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}" {{ ($usuario->roles_id == $rol->id) ? "selected" : "" }}>{{ $rol->rol }}</option>
                        @endforeach
                    </select>
</div>

@endsection
