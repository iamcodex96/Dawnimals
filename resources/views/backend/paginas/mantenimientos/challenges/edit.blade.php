@extends('backend.plantillas.m_edit')
@section('titulo', __('backend.challenge_editar'))
@section('url-index', url("backend/mantenimientos/challenges"))

@section('url-form', action("Backend\Mantenimientos\ChallengesController@update", ["id" => $challenge->id ]))
@section('m_contenido')

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }}</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $challenge->nombre }}">
</div>

<div class="form-group col-md-6">
    <label for="descripcion">{{ __('backend.descripcion') }}</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $challenge->descripcion }}">
</div>

<div class="form-group col-md-6">
    <label for="fecha_ini">{{ __('backend.fecha_ini') }}</label>
    <input type="text" class="form-control fecha" name="fecha_ini" id="fecha_ini" value="{{ date('d/m/Y', strtotime($challenge->fecha_ini)) }}">
</div>

<div class="form-group col-md-6">
    <label for="fecha_fin">{{ __('backend.fecha_fin') }}</label>
    <input type="text" class="form-control fecha" name="fecha_fin" id="fecha_fin" value="{{ date('d/m/Y', strtotime($challenge->fecha_fin)) }}">
</div>

<div class="form-group col-md-6">
    <label for="objetivo">{{ __('backend.objetivo') }}</label>
    <input type="text" class="form-control" name="objetivo" id="objetivo" value="{{ $challenge->objetivo }}">
</div>

<div class="form-group col-md-6">
    <label for="subtipo">{{ __('backend.subtipo') }}</label>
    <select class="form-control" name="subtipo_id" id="subtipo">
        @foreach ($subtipos as $subtipo)
            <option value="{{ $subtipo->id }}" {{ $subtipo->id == $challenge->subtipo_id ? "selected" : ""}}>{{ \App::getLocale() == "ca" ? $subtipo->nombre_cat : $subtipo_nombre_esp }}</option>
        @endforeach
    </select>
</div>
@endsection
