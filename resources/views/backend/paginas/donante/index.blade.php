@extends('backend.plantillas.m_index')
@section('titulo','Donants')
@section('subtitulo','Llistat de donants')
@section('url-crear', url('backend/donantes/create'))

@section('m_contenido')
<div class="card card-body m-3">
    <form class="form-horizontal" action="{{ action('Backend\DonanteController@index') }}" method="post">
        <div class="row search">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="control-label" for="input-name">Nombre o Razón social</label>
                    <input type="text" name="filtros[nombre]" value="" placeholder="Nombre o Razón social del donante" id="input-name" class="form-control"
                        autocomplete="off">
                    <ul class="dropdown-menu"></ul>
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-email">E-Mail</label>
                    <input type="text" name="filter_email" value="" placeholder="E-Mail" id="input-email" class="form-control" autocomplete="off">
                    <ul class="dropdown-menu"></ul>
                </div>

                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Donante habitual</label>
                    <select name="filter_donante_habitual" id="input-donante-habitual" class="form-control">
                                        <option value="*"></option>
                                        <option value="">Sí</option>
                                        <option value="">No</option>
                                    </select>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Tipo Donante</label>
                    <select name="filter_donante_tipo" id="input-donante-tipo" class="form-control">
                                        <option value="*"></option>
                                        <option value="">Particular</option>
                                        <option value="">Empresa</option>
                                        <option value="">Escuela</option>
                                        <option value="">Anónimo</option>
                                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Localidad</label>
                    <select name="filter_donante_localidad" id="input-donante-localidad" class="form-control">
                                        <option value="*"></option>
                                        <option value="">BD</option>
                                        <option value="">BD</option>
                                        <option value="">BD</option>
                                        <option value="">BD</option>
                                        <option value="">BD</option>
                                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Ha adoptado antes?</label>
                    <select name="filter_haAdoptado" id="input-haAdoptado" class="form-control">
                                        <option value="*"></option>
                                        <option value="1">Sí</option>
                                        <option value="2">No</option>

                                    </select>
                </div>


            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Sexo</label>
                    <select name="filter_sexo" id="input-donante-sexo" class="form-control">
                                        <option value="*"></option>
                                        <option value="">Mujer</option>
                                        <option value="">Hombre</option>
                                        <option value="">Otro</option>
                                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="input-customer-group">Vínculo Entidad</label>
                    <select name="filter_donante_vinculo" id="input-donante-vinculo" class="form-control">
                                        <option value="*"></option>
                                        <option value="">Socio</option>
                                        <option value="">Patrocinador</option>
                                        <option value="">Teamer</option>
                                        <option value="">Adoptante</option>
                                        <option value="">Voluntario acogidas</option>

                                    </select>
                </div>

                <div class="form-group" id="listaAnimales" style="display: none;">
                    <label class="control-label" for="input-customer-group">Animal Adoptado</label>
                    <select name="filter_donante_animales" id="input-donante-animales" class="form-control">
                                        <option value="*">Gato</option>
                                        <option value="">Perro</option>
                                        <option value="">Otro</option>
                    </select>

                </div>

                <div class="form-group">
                    <label class="control-label">Fecha Alta</label>
                    <!--pendiente saber de qué, alta o última donación-->
                    <input class="form-control" name="filter_donante_fecha" id="input-donante-fecha" type="date">
                </div>


                <button type="button" id="button-filter" class="btn btn-primary float-right"><i class="fa fa-search"></i> Filtro</button>
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
                        <th class="text-center">Nombre/Razon Social</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Email</th>
                        <th colspan="2" class="text-center">Acción</th>
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
