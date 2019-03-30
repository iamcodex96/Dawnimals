@extends('backend.plantillas.m_index')
@section('titulo','Donacions')
@section('subtitulo','Llistat de donancions')
@section('url-crear', url('backend/donaciones/create'))

@section('m_contenido')

<div class="container-fluid">

    <div class="cabecera mb-4">
        <div class="row">
            <div class="col-md-11 col-sm-12">
                <h1>DONACIONES</h1>
            </div>
            <div class="col-md-1 col-sm-12">
                <a href="{{url('backend/altaDonación')}}" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Agregar donación"> <i class="fa fa-plus"></i> </a>
            </div>
        </div>

    </div>

</div>


<div class="container-fluid">

    <div class="card m-6">

        <div class="card-header">
            <h5>Lista de donaciones</h5>
        </div>

        <div class="card m-3">
            <form class="form-horizontal" action="" method="post">

                <div class="m-5">

                    <div class="row search">
                        <div class="col-lg-4 col-md-12 col-sm-12">

                            <div class="form-group">
                                <label class="control-label" for="input-customer-group">Tipo Donativo</label>
                                <select name="filter_tipo_donativo" id="input-tipo_donativo" class="form-control">
                                    <option value="*"></option>
                                    <option value="">Alimentos</option>
                                    <option value="">Veterinario</option>
                                    <option value="">Oficinas</option>
                                    <option value="">Complementos</option>
                                    <option value="">Encantes</option>
                                    <option value="">Aportaciones monetarias</option>
                                </select>
                            </div>

                            <div id="subtipoDonativos" style="display: none;">
                            <div class="form-group">
                                    <label class="control-label" for="input-customer-group">Subtipo Donativo</label>
                                    <select name="filter_subtipo_donativo" id="input-subtipo_donativo" class="form-control">
                                        <option value="*"></option>
                                        <option value="">Se </option>
                                        <option value="">Rellena</option>
                                        <option value="">Según</option>
                                        <option value="">Tipo</option>

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
                                <select name="filter_receptor" id="input-receptor" class="form-control">
                                    <option value="*"></option>
                                    <option value="">Lista</option>
                                    <option value="">de</option>
                                    <option value="">usuarios?</option>
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
                                <select name="filter_destino" id="input-destino" class="form-control">
                                    <option value="*"></option>
                                    <option value="">Lista</option>
                                    <option value="">de</option>
                                    <option value="">Destinos</option>
                                    <option value="">BD</option>

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
                                    <th class="text-center">Centro</th>
                                    <th class="text-center">Coste</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach ($donaciones as $donacion)

                                            <td class="text-center">{{$donacion->id}}</td>
                                            <td class="text-center">{{$donacion->centroReceptor->nombre}}</td>
                                            <td class="text-center">{{$donacion->coste}}</td>

                                        </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    </form>

    <script>

            $('#input-tipo_donativo').change(function() {

                opt = $('#input-tipo_donativo').val();

                console.log(opt);

                if (opt == "") {
                    $('#subtipoDonativos').show();
                } else {
                    $('#subtipoDonativos').hide();
                }

            });

        </script>




    @endsection
