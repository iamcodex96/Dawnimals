@extends('backend.plantillas.m_index')
@section('titulo', __('backend.subtipos'))
@section('subtitulo', __('backend.listado_subtipos'))

@section('url-crear', url('backend/mantenimientos/subtipos/create'))
@section('m_contenido')

<form class="card card-body m-2 collapse filtro" action="{{ action('Backend\Mantenimientos\SubtiposController@index') }}"
    method="GET">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="filtrosNombre">{{ __('backend.nombre') }}</label>
            <input type="text" class="form-control" name="filtros[nombre]" id="filtrosNombre" value="{{ $filtros['nombre'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="filtrosTipo">{{ __('backend.tipo') }}</label>
            <select class="form-control" name="filtros[tipo.nombre]" id="filtrosTipo">
                <option value="">{{ __("backend.todos") }}</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->nombre }}" {{ $filtros["tipo.nombre"] == $tipo->nombre ? "selected" : ""}}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="filtrosUnidad">{{ __('backend.unidad') }}</label>
            <input type="text" class="form-control" name="filtros[tipo_unidad]" id="filtrosUnidad" value="{{ $filtros['tipo_unidad'] }}">
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
            <th>{{ __('backend.tipo') }}</th>
            <th>{{ __('backend.gama') }} {{ __('backend.alta') }}</th>
            <th>{{ __('backend.gama') }} {{ __('backend.media') }}</th>
            <th>{{ __('backend.gama') }} {{ __('backend.baja') }}</th>
            <th>{{ __('backend.unidad') }}</th>
            <th class="buttons-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($subtipos as $subtipo)
        <tr>
            <td>{{ $subtipo->nombre }}</td>
            <td>{{ $subtipo->tipo != null ? $subtipo->tipo->nombre : "" }}</td>
            <td>{{ $subtipo->gama_alta }}</td>
            <td>{{ $subtipo->gama_media }}</td>
            <td>{{ $subtipo->gama_baja }}</td>
            <td>{{ $subtipo->tipo_unidad }}</td>
            <td class="text-center">
                <div class="form-group btn-group btn-group-form">
                    <a href="{{ action('Backend\Mantenimientos\SubtiposController@edit', ['id' => $subtipo->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                    <form action="{{ action('Backend\Mantenimientos\SubtiposController@destroy', ['id' => $subtipo->id])}}" method="post">
                        @method("delete") @csrf
                        <button type="submit" onclick="destroySubmit(this, event, '{{ $subtipo->nombre }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
@endsection
