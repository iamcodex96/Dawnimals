@extends('backend.plantillas.m_index')
@section('titulo', __('backend.usuarios'))
@section('subtitulo', __('backend.listado_usuarios'))
@section('url-crear', url('backend/mantenimientos/usuarios/create'))
@section('m_contenido')

<form class="card card-body m-2 collapse filtro" action="{{ action('Backend\Mantenimientos\UsuariosController@index') }}" method="GET">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="">{{ __('backend.nombre') }}</label>
            <input type="text" class="form-control" name="filtros[nombre]" id="filtrosNombre" value="{{ $filtros['nombre'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="">{{ __('backend.usuario') }}</label>
            <input type="text" class="form-control" name="filtros[nombre_usuario]" id="filtrosNombre" value="{{ $filtros['nombre_usuario'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="">{{ __('backend.correo') }}</label>
            <input type="text" class="form-control" name="filtros[correo]" id="filtrosNombre" value="{{ $filtros['correo'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="">{{ __('backend.perfil') }}</label>
            <input type="text" class="form-control" name="filtros[role.rol]" id="filtrosNombre" value="{{ $filtros['role.rol'] }}">
        </div>

        <div class="form-group col-md-6">
            <input type="submit" class="btn btn-primary" value="Filtrar">
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>{{ __('backend.nombre') }}</th>
            <th>{{ __('backend.usuario') }}</th>
            <th>{{ __('backend.correo') }}</th>
            <th>{{ __('backend.perfil') }}</th>
            <th class="buttons-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->nombre_usuario }}</td>
            <td>{{ $usuario->correo }}</td>
            <td>{{ $usuario->admin ? __('backend.administrador') : __('backend.trabajador') }}</td>
            <td class="text-center">
                <div class="form-group btn-group btn-group-form">
                    <a href="{{ action('Backend\Mantenimientos\UsuariosController@edit', ['id' => $usuario->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                    <form action="{{ action('Backend\Mantenimientos\UsuariosController@destroy', ['id' => $usuario->id])}}" method="post">
                        @method("delete") @csrf
                        <button type="submit" onclick="destroySubmit(this, event, '{{ $usuario->nombre }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
