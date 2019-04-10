@extends('backend.plantillas.m_index')
@section('titulo','Donants')
@section('subtitulo','Llistat de donants')
@section('url-crear', url('backend/donantes/create'))

@section('m_contenido')
<div class="card card-body m-3 collapse filtro">
    <form class="form-horizontal" action="{{ action('Backend\DonanteController@index') }}" method="GET">
        @csrf
        <div class="row search">

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-name">{{__('backend.nombre_donante')}}</label>
                    <input type="text" name="filtros[nombre]" value="{{ $filtros["nombre"] }}" placeholder="Nombre o Razón social del donante" id="input-name" class="form-control">
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-email">{{__('backend.correo')}}</label>
                    <input type="text" name="filtros[correo]" value="{{ $filtros["correo"] }}" placeholder="E-Mail" id="input-email" class="form-control" autocomplete="off">
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.habitual')}}</label>
                    <select name="filtrosBooleanos[es_habitual]" id="input-donante-habitual" class="form-control">
                            <option value="">{{ __('backend.todos') }}</option>
                            <option value="true" {{ $filtrosBooleanos["es_habitual"] === true ? "selected" : ""}}>{{ __('backend.si') }}</option>
                            <option value="false" {{ $filtrosBooleanos["es_habitual"] === false ? "selected" : ""}}>{{ __('backend.no') }}</option>
                        </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.tipo_donante')}}</label>
                    <select name="filtrosNumericos[tipos_donantes_id]" id="input-donante-tipo" class="form-control">
                        <option value="">{{ __('backend.todos') }}</option>
                        @foreach($tipos_donante as $tipo)
                            <option value="{{ $tipo->id }}" {{ $tipo->id == $filtrosNumericos["tipos_donantes_id"] ? "selected" : "" }}>{{ $tipo->tipo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.localidad')}}</label>
                    <input type="text" name="filtros[poblacion]" value="{{ $filtros["poblacion"] }}" id="input-donante-localidad" class="form-control" />
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.sexo')}}</label>
                    <select name="filtrosNumericos[sexo.id]" id="input-donante-sexo" class="form-control">
                        <option value="">{{ __('backend.todos') }}</option>
                        @foreach($sexos as $sexo)
                            <option value="{{ $sexo->id }}" {{ $sexo->id == $filtrosNumericos["sexo.id"] ? "selected" : "" }}>{{ $sexo->sexo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.vinculo')}}</label>
                    <select name="filtros[vinculo_entidad]" id="input-donante-vinculo" class="form-control">
                        <option value="">{{ __('backend.todos') }}</option>
                        <option value="Socio" {{ $filtros["vinculo_entidad"] == "Socio" ? "selected" : "" }}>Socio</option>
                        <option value="Patrocinador" {{ $filtros["vinculo_entidad"] == "Patrocinador" ? "selected" : "" }}>Patrocinador</option>
                        <option value="Teamer" {{ $filtros["vinculo_entidad"] == "Teamer" ? "selected" : "" }}>Teamer</option>
                        <option value="Adoptante" {{ $filtros["vinculo_entidad"] == "Adoptante" ? "selected" : "" }}>Adoptante</option>
                        <option value="Voluntario acogidas" {{ $filtros["vinculo_entidad"] == "Voluntario acogidas" ? "selected" : "" }}>Voluntario acogidas</option>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label">{{__('backend.fecha_alta')}}</label>
                    <input class="form-control" name="filter_donante_fecha" id="input-donante-fecha" type="date">
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">{{__('backend.adopta')}}</label>
                    <select name="filter_haAdoptado" id="input-haAdoptado" class="form-control">
                        <option value="*"></option>
                        <option value="1">Sí</option>
                        <option value="2">No</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="listaAnimales" style="display: none;">
                    <label class="control-label" for="input-customer-group">{{__('backend.animal_adoptado')}}</label>
                    <select name="filtrosNumericos[animales.animales_id]" id="input-donante-animales" class="form-control">
                        <option value="">{{ __('backend.todos') }}</option>
                        @foreach($animales as $animal)
                            <option value="{{ $animal->id }}" {{ $animal->id == $filtrosNumericos["animales.animales_id"] ? "selected" : "" }}>{{ $animal->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <button type="submit" name="submit" id="button-filter" class="btn btn-primary"><i class="fa fa-search"></i> {{__('backend.filtro')}}</button>
                    <input type="submit" name="submit" class="d-none" id="exportarExcel" value="excel">
                </div>


        </div>
    </form>
</div>


<div class="card card-body m-3">
    <div class="col-lg-12 col-md-8">
        <div class="table-responsive text-center">
            <table class="table table-striped">
                <thead class=" thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{__('backend.nombre_donante')}}</th>
                        <th class="text-center">{{__('backend.direccion')}}</th>
                        <th class="text-center">{{__('backend.telefono')}}</th>
                        <th class="text-center">{{__('backend.correo')}}</th>
                        <th colspan="2" class="text-center">{{__('backend.accion')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donantes as $donante)
                    <tr data-nombre="{{ $donante->cif }}" data-nombre="{{ $donante->nombre }}" data-direccion="{{ $donante->direccion }}" data-telefono="{{ $donante->telefono }}"
                        data-correo="{{ $donante->correo }}">

                        <td class="text-center min-wdth">{{$donante->cif}}</td>
                        <td class="text-center">{{$donante->nombre}}</td>
                        <td class="text-center">{{$donante->direccion}}</td>
                        <td class="text-center">{{$donante->telefono}}</td>
                        <td class="text-center">{{$donante->correo}}</td>
                        <td colspan="2" style="width: 1%" class="text-center">

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form class="p-0 m-0" action="{{ action('Backend\DonanteController@show',[$donante->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Ver" class="btn btn-primary" data-original-title="Ver"><i class="fa fa-eye"></i></button>
                                </form>
                                <form class="p-0 m-0" action="{{ action('Backend\DonanteController@edit',[$donante->id]) }}" method="GET">
                                    @method('put') @csrf
                                    <button type="submit" data-toggle="tooltip" title="Modificar" class="btn btn-warning" data-original-title="Ver"><i class="fa fa-edit"></i></button>
                                </form>
                                <form class="p-0 m-0" action="{{ action('Backend\DonanteController@destroy',[$donante->id]) }}" method="post">
                                    @method('delete') @csrf
                                    <button type="submit" onclick="destroySubmit(this, event, {{$donante->nombre}})" data-toggle="tooltip" title="Borrar" class="btn btn-danger"
                                        data-original-title="Ver"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("scripts")
@parent
<script src="{{ asset('js/api/dawnimalsAPI.js') }}"></script>
<script>
        $('#input-haAdoptado').change(function() {

                opt = $('#input-haAdoptado').val();

                console.log(opt);

                if (opt == "1") {
                    $('#listaAnimales').show();
                } else if (opt == "2"|| opt =="*") {
                    $('#listaAnimales').hide();
                }

            });

    </script>
@endsection
