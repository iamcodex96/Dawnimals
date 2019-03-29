@extends('backend.plantillas.m_create')
@section('titulo','ALTA PERFIL')
@section('url-index', url('backend/mantenimientos/perfiles'))

@section('url-form', action('Backend\Mantenimientos\PerfilesController@store'))
@section('m_contenido')

<div class="form-group offset-md-3 col-md-6">
    <label for="rol">Nombre</label>
    <input name="rol" id="rol" type="text" class="col form-control" value="{{ old(" rol ") }}">
</div>
@endsection
