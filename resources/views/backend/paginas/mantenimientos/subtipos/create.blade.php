@extends('backend.plantillas.m_create')
@section('titulo', __("backend.subtipo_alta"))
@section('url-index', url("backend/mantenimientos/subtipos"))

@section('url-form', action('Backend\Mantenimientos\SubtiposController@store'))
@section('m_contenido')

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }}</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
</div>

<div class="form-group col-md-6">
    <label for="tipo">{{ __('backend.tipo') }}</label>
    <select class="form-control" name="tipos_id" id="tipo">
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->tipos_id }}" {{ $tipo->tipos_id == old('tipos_id') ? "selected" : ""}}>{{ $tipo->nombre }}</option>
            @endforeach
        </select>
</div>

<div class="form-group col-md-6">
    <label for="gama_alta">{{ __('backend.gama') }} {{ __('backend.alta') }}</label>
    <input type="text" class="form-control" name="gama_alta" id="gama_alta" value="{{ old('gama_alta') }}">
</div>

<div class="form-group col-md-6">
    <label for="gama_media">{{ __('backend.gama') }} {{ __('backend.media') }}</label>
    <input type="text" class="form-control" name="gama_media" id="gama_media" value="{{ old('gama_media') }}">
</div>

<div class="form-group col-md-6">
    <label for="gama_baja">{{ __('backend.gama') }} {{ __('backend.baja') }}</label>
    <input type="text" class="form-control" name="gama_baja" id="gama_baja" value="{{ old('gama_baja') }}">
</div>

<div class="form-group col-md-6">
    <label for="tipo_unidad">{{ __('backend.unidad') }}</label>
    <input type="text" class="form-control" name="tipo_unidad" id="tipo_unidad" value="{{ old('tipo_unidad') }}">
</div>
@endsection
