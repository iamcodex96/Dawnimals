@extends('backend.plantillas.m_create')
@section('titulo', __("backend.challenge_alta"))
@section('url-index', url("backend/mantenimientos/challenges"))

@section('url-form', action('Backend\Mantenimientos\ChallengesController@store'))
@section('m_contenido')

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }}</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
</div>

<div class="form-group col-md-6">
    <label for="descripcion">{{ __('backend.descripcion') }}</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
</div>

<div class="form-group col-md-6">
    <label for="fecha_ini">{{ __('backend.fecha_ini') }}</label>
    <input type="text" class="form-control fecha" name="fecha_ini" id="fecha_ini" value="{{ old('fecha_ini') }}">
</div>

<div class="form-group col-md-6">
    <label for="fecha_fin">{{ __('backend.fecha_fin') }}</label>
    <input type="text" class="form-control fecha" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}">
</div>

<div class="form-group col-md-6">
    <label for="objetivo">{{ __('backend.objetivo') }}</label>
    <input type="text" class="form-control" name="objetivo" id="objetivo" value="{{ old('objetivo') }}">
</div>

<div class="form-group col-md-6">
    <label for="subtipo">{{ __('backend.subtipo') }}</label>
    <select class="form-control" name="subtipo_id" id="subtipo">
            @foreach ($subtipos as $subtipo)
                <option value="{{ $subtipo->id }}" {{ $subtipo->id == old('subtipo_id') ? "selected" : ""}}>{{ \App::getLocale() == "ca" ? $subtipo->nombre_cat : $subtipo_nombre_esp }}</option>
            @endforeach
        </select>
</div>
@endsection
