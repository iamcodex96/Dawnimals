@extends('backend.plantillas.m_index')
@section('titulo','Donacions')
@section('subtitulo','Llistat de donancions')
@section('url-crear', url('backend/donaciones/create'))

@section('m_contenido')

<div class="card m-3 collapse filtro">
    <form class="form-horizontal" action="" method="post">

        <div class="m-5">

            <div class="row search">
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="form-group">
                        <label class="control-label" for="input-customer-group">Tipo Donativo</label>
                        <select id="tipo" name="filter_tipo_donativo" id="input-tipo_donativo" class="form-control">
                            <option value="*"></option>
                        </select>
                    </div>

                    <div id="subtipoDonativos" style="display: none;">
                    <div class="form-group">
                            <label class="control-label" for="input-customer-group">Subtipo Donativo</label>
                            <select id="subtipo" name="filter_subtipo_donativo" id="input-subtipo_donativo" class="form-control">
                                <option value="*"></option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                            <label class="control-label" for="input-customer-group">Colaborador</label>
                            <select name="filter_colaborador" id="input-colaborador" class="form-control">
                                <option value="*"></option>
                                <option value="">Lista</option>
                                <option value="">Colaboladores</option>
                                <option value="">O</option>
                                <option value="">Autocomplete</option>
                            </select>
                    </div>

                    <div class="form-group">
                            <label class="control-label" for="input-customer-group">Canal</label>
                            <select name="filter_canal" id="input-canal" class="form-control">
                                <option value="*"></option>
                                <option value="">?</option>
                                <option value="">?</option>
                                <option value="">?</option>
                                <option value="">Autocomplete</option>
                            </select>
                    </div>


                </div>





                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="form-group">
                        <label class="control-label" for="input-customer-group">Centro receptor</label>
                        <select id="centroR" name="filter_receptor" id="input-receptor" class="form-control">
                            <option value="*"></option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label class="control-label" for="input-customer-group">Localidad</label>
                            <select name="filter_localidad" id="input-localidad" class="form-control">
                                <option value="*"></option>
                                <option value="">Lista</option>
                                <option value="">de</option>
                                <option value="">localidades</option>
                            </select>
                        </div>




                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="control-label" for="input-customer-group">Centro Destino</label>
                        <select id="centroD" name="filter_destino" id="input-destino" class="form-control">
                            <option value="*"></option>
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="full_name_id" class="control-label">Importe donación</label>
                            <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                    </div>



                    <button type="button" id="button-filter" class="btn btn-primary float-right"><i class="fa fa-search"></i> Filtro</button>

                </div>





            </div>
        </div>
</div>



<div class="card mt-3 mb-3 mr-3 ml-3">
    <!--Body-->
    <div class="card-body">

        <form action="" method="post">

            <div class="col-lg-12 col-md-8">
                <div class="table-responsive" text-align="center">
                    <table class="table table-bordered table-striped">

                    <thead class=" thead-dark">

                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Subtipo</th>
                            <th class="text-center">Centro Receptor</th>
                            <th class="text-center">Coste</th>

                            <th class="text-center">Acción</th>

                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($donaciones as $donacion)

                                    <td class="text-center">{{$donacion->id}}</td>
                                    <td class="text-center">{{$donacion->subtipos->tipos->nombre}}</td>
                                    <td class="text-center">{{$donacion->subtipos->nombre}}</td>
                                    <td class="text-center">{{$donacion->centro->nombre}}</td>
                                    <td class="text-center">{{$donacion->coste}}</td>


                                    <td colspan="2" style="width: 1%" class="text-center">

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form class="p-0 m-0" action="" method="GET">
                                            @csrf
                                            <button type="submit" data-toggle="tooltip" title="Ver" class="btn btn-primary" data-original-title="Ver"><i class="fa fa-eye"></i></button>
                                        </form>
                                        <form class="p-0 m-0" action="{{ action('Backend\DonacionController@edit',[$donacion->id]) }}" method="GET">

                                            <button type="submit" data-toggle="tooltip" title="Modificar" class="btn btn-warning" data-original-title="Ver"><i class="fa fa-edit"></i></button>
                                        </form>
                                        <form class="p-0 m-0" action="{{ action('Backend\DonacionController@destroy',[$donacion->id]) }}" method="post">
                                            @method('delete') @csrf
                                            <button type="submit" onclick="destroySubmit(this, event, {{$donacion->nombre}})" data-toggle="tooltip" title="Borrar" class="btn btn-danger"
                                                data-original-title="Ver"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </form>
</div>


</form>
@section('scripts')
@parent
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
