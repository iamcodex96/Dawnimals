@extends('Plantillas.master-private')@section('titulo','donaciones')


@section('contenido')

<div class="container-fluid">

    <div class="cabecera mb-4">
        <div class="row">
            <div class="col-md-11 col-sm-12">
                <h1>DONANTES</h1>
            </div>
            <div class="col-md-1 col-sm-12">
                <button type="button" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Agregar donante"> <i class="fa fa-plus"></i> </button>

            </div>
        </div>

    </div>


</div>


<div class="container-fluid">

    <div class="card m-6">

        <div class="card-header">
            <h5>Lista de donantes</h5>
        </div>

        <div class="card m-3">
            <form class="form-horizontal" action="" method="post">

                <div class="m-5">

                    <div class="row search">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="input-name">Nombre o Razón social</label>
                                <input type="text" name="filter_name" value="" placeholder="Nombre o Razón social del donante" id="input-name" class="form-control" autocomplete="off">
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



                            <div class="form-group">
                                <label class="control-label">Fecha Alta</label>
                                <!--pendiente saber de qué, alta o última donación-->
                                <input class="form-control" name="filter_donante_fecha"id="input-donante-fecha" type="date">
                            </div>

                            <button type="button" id="button-filter" class="btn btn-primary float-right"><i class="fa fa-search"></i> Filtro</button>


                            <div class="form-group" id="listaAnimales" hidden>
                                <label class="control-label" for="input-customer-group">Animal Adoptado</label>
                                <select name="filter_donante_animales" id="input-donante-animales" class="form-control">
                                    <option value="*">Gato</option>
                                    <option value="">Perro</option>
                                    <option value="">Otros</option>

                                </select>
                            </div>
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
                            <table class="table table-bordered table-striped>
                           
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
                                    <tr>

                                        <td class="text-center">1,001</td>
                                        <td class="text-center">{{$donante->nombreORazonSocial}}</td>
                                        <td class="text-center">{{$donante->direccion}}</td>
                                        <td class="text-center">{{$donante->telefono}}</td>
                                        <td class="text-center">{{$donante->email}}</td>
                                        <td style="width: 1%" class="text-center">  <a href="{{url('fichaDonante')}}" data-toggle="tooltip" title="Ver Detalle" class="btn btn-info" data-original-title="Ver"><i class="fa fa-eye"></i></a></td> 
                                        <td style="width: 1%"class="text-center">  <a href="#" data-toggle="tooltip" title="Borrar" class="btn btn-danger" data-original-title="Ver"><i class="fa fa-trash"></i></a></td> 
                                       
                                    </tr>

                                    @endforeach
                                    </tr>
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

        $('#haAdoptado').change(function() {

            opt = $(this).val();

            console.log(opt);

            if (opt == "1") {
                $('listaAnimales').show();
            } else if (opt == "2") {
                $('#listaAnimales').hide();
            }

        });
    </script>


    @endsection 