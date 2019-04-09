@extends('backend.plantillas.m_edit')
@section('titulo', __('backend.subtipo_editar'))
@section('url-index', url("backend/mantenimientos/subtipos"))

@section('url-form', action("Backend\Mantenimientos\SubtiposController@update", ["id" => $subtipo->id ]))
@section('m_contenido')

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }} {{ __("backend.catalan") }}</label>
    <input type="text" class="form-control" name="nombre_cat" id="nombre_cat" value="{{ $subtipo->nombre_cat }}">
</div>

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }} {{ __("backend.español") }}</label>
    <input type="text" class="form-control" name="nombre_esp" id="nombre_esp" value="{{ $subtipo->nombre_esp }}">
</div>

<div class="form-group col-md-6">
    <label for="nombre">{{ __('backend.nombre') }} {{ __("backend.ingles") }}</label>
    <input type="text" class="form-control" name="nombre_eng" id="nombre_eng" value="{{ $subtipo->nombre_eng }}">
</div>

<div class="form-group col-md-6">
    <label for="tipo">{{ __('backend.tipo') }}</label>
    <select class="form-control" name="tipos_id" id="tipo">
            @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ $tipo->id == $subtipo->tipos_id ? "selected" : ""}}>{{ $tipo->nombre }}</option>
            @endforeach
        </select>
</div>

<div class="form-group col-md-6">
    <label for="gama_alta">{{ __('backend.gama') }} {{ __('backend.alta') }}</label>
    <input type="text" class="form-control" name="gama_alta" id="gama_alta" value="{{ $subtipo->gama_alta }}">
</div>

<div class="form-group col-md-6">
    <label for="gama_media">{{ __('backend.gama') }} {{ __('backend.media') }}</label>
    <input type="text" class="form-control" name="gama_media" id="gama_media" value="{{ $subtipo->gama_media }}">
</div>

<div class="form-group col-md-6">
    <label for="gama_baja">{{ __('backend.gama') }} {{ __('backend.baja') }}</label>
    <input type="text" class="form-control" name="gama_baja" id="gama_baja" value="{{ $subtipo->gama_baja }}">
</div>

<div class="form-group col-md-6">
    <label for="tipo_unidad">{{ __('backend.unidad') }}</label>
    <input type="text" class="form-control" name="tipo_unidad" id="tipo_unidad" value="{{ $subtipo->tipo_unidad }}">
</div>

@endsection
