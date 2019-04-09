@extends('backend.plantillas.m_index')
@section('titulo', __('backend.challenges'))
@section('subtitulo', __('backend.listado_challenges'))

@section('url-crear', url('backend/mantenimientos/challenges/create'))
@section('m_contenido')

<form class="card card-body m-2 collapse filtro" action="{{ action('Backend\Mantenimientos\ChallengesController@index') }}"
    method="GET">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="filtrosNombre">{{ __('backend.nombre') }}</label>
            <input type="text" class="form-control" name="filtros[nombre]" id="filtrosNombre" value="{{ $filtros['nombre'] }}">
        </div>

        <div class="form-group col-md-6">
            <label for="filtrosUnidad">{{ __('backend.descripcion') }}</label>
            <input type="text" class="form-control" name="filtros[descripcion]" id="filtrosDescripcion" value="{{ $filtros['descripcion'] }}">
        </div>

        <div class="form-group col-md-6">
            <label for="filtrosSubtipo">{{ __('backend.subtipo') }}</label>
            <select class="form-control" name="filtrosEspeciales[subtipo]" id="filtrosTipo">
                    <option value="">{{ __("backend.todos") }}</option>
                    @foreach ($subtipos as $subtipo)
                        <option value="{{ $subtipo->id }}" {{ $filtrosEspeciales["subtipo"] == $subtipo->id ? "selected" : ""}}>{{ \App::getLocale() == "ca" ? $subtipo->nombre_cat : $subtipo->nombre_esp }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group col-md-6">
            <input type="submit" class="btn btn-primary" value="Filtrar">
            <input type="submit" name="submit" class="d-none" id="exportarExcel" value="excel">
        </div>
    </div>
</form>

<div class="table-responsive">
        <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('backend.nombre') }}</th>
                        <th>{{ __('backend.descripcion') }}</th>
                        <th class="text-center">{{ __('backend.fecha_ini') }}</th>
                        <th class="text-center">{{ __('backend.fecha_fin') }}</th>
                        <th>{{ __('backend.objetivo') }}</th>
                        <th>{{ __('backend.subtipo') }}</th>
                        <th class="buttons-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($challenges as $challenge)
                    <tr>
                        <td>{{ $challenge->nombre }}</td>
                        <td>{{ $challenge->descripcion }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($challenge->fecha_ini)) }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($challenge->fecha_fin)) }}</td>
                        <td>{{ $challenge->objetivo }}</td>
                        <td>{{ \App::getLocale() == "ca" ? $challenge->subtipo->nombre_cat : $challenge->subtipo->nombre_esp }}</td>
                        <td class="text-center">
                            <div class="form-group btn-group btn-group-form">
                                <a href="{{ action('Backend\Mantenimientos\ChallengesController@edit', ['id' => $challenge->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                                <form action="{{ action('Backend\Mantenimientos\ChallengesController@destroy', ['id' => $challenge->id])}}" method="post">
                                    @method("delete") @csrf
                                    <button type="submit" onclick="destroySubmit(this, event, '{{ $challenge->nombre }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
</div>

@endsection
