@extends('backend.plantillas.m_index')
@section('titulo','Donacions')
@section('subtitulo','Llistat de donancions')
@section('url-crear',
url('backend/donaciones/create'))
@section('m_contenido')

<div class="card m-3 collapse filtro">
    <form class="form-horizontal" action="{{ action('Backend\DonacionController@index') }}" method="get">
        <div class="m-5">
            <div class="row search">

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Tipo Donativo</label>
                    <select id="tipo" id="input-tipo_donativo" class="form-control">
                            <option value="*"></option>
                        </select>
                </div>

                <div id="subtipoDonativos" class="col-sm-4" style="display: none;">
                    <div class="form-group">
                        <label class="control-label" for="input-customer-group">Subtipo Donativo</label>
                        <select id="subtipo" name="filtrosNumericos[subtipos_id]" id="input-subtipo_donativo" class="form-control">
                            <option value="">{{ __('backend.todos')}}</option>
                        </select>
                    </div>
                </div>

                {{--
                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Colaborador</label>
                    <select name="filter_colaborador" id="input-colaborador" class="form-control">
                                <option value="*"></option>
                                <option value="">Lista</option>
                                <option value="">Colaboladores</option>
                                <option value="">O</option>
                                <option value="">Autocomplete</option>
                            </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Canal</label>
                    <select name="filter_canal" id="input-canal" class="form-control">
                                <option value="*"></option>
                                <option value="">?</option>
                                <option value="">?</option>
                                <option value="">?</option>
                                <option value="">Autocomplete</option>
                            </select>
                </div> --}}


                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Centro receptor</label>
                    <select id="centroR" name="filtrosNumericos[centros_receptor_id]" id="input-receptor" class="form-control">
                        <option value="">{{ __('backend.todos')}}</option>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Centro Destino</label>
                    <select id="centroD" name="filtrosNumericos[centros_desti_id]" id="input-destino" class="form-control">
                        <option value="">{{ __('backend.todos')}}</option>
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Donante</label>
                    <input name="filtros[donantes.nombre]" value="{{ $filtros['donantes.nombre'] }}" id="input-donante" class="form-control"
                    />
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label" for="input-customer-group">Localidad donante</label>
                    <input name="filtros[donantes.poblacion]" value="{{ $filtros['donantes.poblacion'] }}" id="input-localidad" class="form-control"
                    />
                </div>

                <div class="form-group col-sm-4">
                    <label for="full_name_id" class="control-label">Importe donación</label>
                    <input type="text" class="form-control" id="full_name_id" value="{{ $filtrosNumericos['coste'] }}" name="filtrosNumericos[coste]"
                        placeholder="">
                </div>

                <div class="form-group  col-sm-4">
                    <input type="submit" class="btn btn-primary" value="Filtrar">
                    <input type="submit" name="submit" class="d-none" id="exportarExcel" value="excel">
                </div>
            </div>
        </div>
    </form>
</div>


<div class="card mt-3 mb-3 mr-3 ml-3">
    <!--Body-->
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead class="" style="background-color: #88AA00; color: white;">
                    <tr>
                        <th class="text-center">{{ __("backend.fecha") }}</th>
                        <th class="text-center">{{ __("backend.tipo") }}</th>
                        <th class="text-center">{{ __("backend.subtipo") }}</th>
                        <th class="text-center">{{ __("backend.donante") }}</th>
                        <th class="text-center">{{ __("backend.centro_receptor") }}</th>
                        <th class="text-center">{{ __("backend.centro_destino") }}</th>
                        <th class="text-center">{{ __("backend.coste") }}</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donaciones as $donacion)
                    <tr>

                        <td class="text-center">{{$donacion->fecha_donativo}}</td>
                        <td class="text-center">{{$donacion->subtipos->tipos->nombre}}</td>
                        <td class="text-center">{{ \App::getLocale() == "ca" ? $donacion->subtipos->nombre_cat : $donacion->subtipos->nombre_esp}}</td>
                        <td class="text-center">{{ $donacion->donantes != null ? $donacion->donantes->nombre : __("backend.anonimo")}}</td>
                        <td class="text-center">{{$donacion->centro->nombre}}</td>
                        <td class="text-center">{{$donacion->centro_destino->nombre}}</td>
                        <td class="text-center">{{$donacion->coste}}</td>


                        <td colspan="2" style="width: 1%" class="text-center">

                            <div class="btn-group" role="group" aria-label="Basic example">

                                {{--
                                <form class="p-0 m-0" action="" method="GET">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Ver" class="btn btn-primary" data-original-title="Ver"><i class="fa fa-eye"></i></button>
                                </form> --}}

                                <form class="p-0 m-0" action="{{ action('Backend\DonacionController@diploma',[$donacion->id]) }}" method="GET">
                                    <button type="submit" data-toggle="tooltip" title="Diploma" class="btn btn-primary" data-original-title="Diploma"><i class="fa fa-certificate"></i></button>
                                </form>

                                <form class="p-0 m-0" action="{{ action('Backend\DonacionController@edit',[$donacion->id]) }}" method="GET">
                                    <button type="submit" data-toggle="tooltip" title="Modificar" class="btn btn-warning" data-original-title="Ver"><i class="fa fa-edit"></i></button>
                                </form>
                                <form class="p-0 m-0" action="{{ action('Backend\DonacionController@destroy',[$donacion->id]) }}" method="post">
                                    @method('delete') @csrf
                                    <button type="submit" onclick="destroySubmit(this, event, '{{$donacion->fecha_donativo}} - {{$donacion->subtipos->tipos->nombre}} - {{ $donacion->donantes != null ? $donacion->donantes->nombre : __("backend.anonimo")}}')" data-toggle="tooltip" title="Borrar" class="btn btn-danger"
                                        data-original-title="Ver"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $donaciones->appends($_GET)->links() }}
        </div>
    </div>
</div>






@section('scripts') @parent
<script>
    idioma = "{{App::getLocale()}}";
        console.log(idioma);

</script>
<script>
    $('#tipo').change(function() {

                opt = $('#tipo').val();

                console.log(opt);

                if (opt != "") {
                    $('#subtipoDonativos').show();
                } else {
                    $('#subtipoDonativos').hide();
                }
            });

</script>
<script src="{{ asset('js/api/donacionesAPI.js') }}"></script>
@endsection

@endsection
