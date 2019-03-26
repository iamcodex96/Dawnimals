@extends('backend.plantillas.master')

@section('titulo','donaciones')


@section('contenido')
<div class="titulo text-center mb-3">

    <h4>ALTA DONANTE</h4>

</div>


<div id="container" class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                <form action="{{ action('DonanteController@update') }}" method="POST">
                    @csrf
                    <div class="card mt-3">
                        <div class="card-header">
                                <h4>Datos personales</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group float-left col-md-6"> <!-- State Button -->
                                <label for="tipoD" class="control-label">Tipo de donante</label>
                                <select class="form-control" name="tipoD">
                                    @foreach ($tipodonantes as $td)
                                    <option value="{{$td->id}}">{{$td->tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group float-left col-md-6">
                                <label for="full_name_id" class="control-label">Nombre o Razón social</label>
                                <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                            </div>
                            <div class="form-group float-left col-md-6">
                                    <label for="cif" class="control-label">CIF/NIF</label>
                                    <input type="text" class="form-control" id="cif" name="cif" placeholder="">
                                </div>

                                <div class="form-group float-left col-md-6">
                                    <label for="direccion" class="control-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="">
                                </div>

                                <div class="form-group float-left col-md-6">
                                    <label for="ciudad" class="control-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="">
                                </div>

                                <div class="form-group float-left col-md-6">
                                    <label for="cp" class="control-label">Código Postal</label>
                                    <input type="text" class="form-control" id="cp" name="cp" placeholder="">
                                </div>


                                <div class="form-group float-left col-md-6">
                                    <label for="pais" class="control-label">País</label>
                                    <select class="form-control" name="pais">
                                        <option value="ES">España</option>
                                        <option value="FR">Francia</option>
                                        <option value="PT">Portugal</option>
                                    </select>
                                </div>

                                <div class="form-group float-left col-md-6">
                                    <label for="sexo" class="control-label">Sexo</label>
                                    <select class="form-control" name="sexo">
                                        @foreach ($sexos as $sexo)
                                        <option value="{{$sexo->id}}">{{$sexo->sexo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group float-left col-md-12">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="">
                                </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                            <div class="card-header">
                                    <h4>Información adicional</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-group float-left col-md-6">
                                            <label for="tieneAnimales" class="control-label">¿Tiene animales?</label>
                                            <select class="form-control" name="tieneAnimales">
                                                <option value="*"></option>
                                                <option value="1">Sí</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group float-left col-md-6">
                                            <label for="esHabitual" class="control-label">¿Es donante habitual?

                                            </label>
                                                <select class="form-control" name="esHabitual">
                                                    <option value="*"></option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select>
                                        </div>

                                        <div class="form-group float-left col-md-6">
                                                <label for="aAdoptado" class="control-label">¿Ha adoptado alguna vez?

                                                </label>
                                                    <select class="form-control" name="aAdoptado">
                                                        <option value="*"></option>
                                                        <option value="1">Sí</option>
                                                        <option value="0">No</option>
                                                    </select>
                                            </div>


                                            <div class="form-group float-left col-md-6">
                                                <label for="esColaborador" class="control-label">¿Es colaborador?

                                                </label>
                                                    <select class="form-control" name="esColaborador">
                                                        <option value="*"></option>
                                                        <option value="1">Sí</option>
                                                        <option value="0">No</option>
                                                    </select>
                                        </div>

                                        <div class="form-group float-left col-md-6">
                                                <label for="tipoColaborador" class="control-label">Tipo de colaboración

                                                </label>
                                                    <select class="form-control" id="tipoColaborador">
                                                        <option value="*"></option>
                                                        <option value="1">no sé</option>
                                                        <option value="0">no sé</option>
                                                    </select>
                                        </div>

                                        <div class="form-group float-left col-md-6">
                                            <label for="vinculo" class="control-label">Vínculo Entidad</label>
                                            <select class="form-control" name="vinculo">
                                                    <option value="*"></option>
                                                    <option value="Socio">Socio</option>
                                                    <option value="Patrocinador">Patrocinador</option>
                                                    <option value="Teamer">Teamer</option>
                                                    <option value="Adoptante">Adoptante</option>
                                                    <option value="Voluntario">Voluntario acogidas</option>
                                            </select>
                                        </div>




                                        <!--pendiente saber de qué, alta o última donación-->
                                        <input class="form-control" name="fecha_actual"id="fecha" type="hidden">

                            </div>
                    </div>
                    <div class="botonAceptar text-center mb-5 mt-4">

                        <button type="submit" class="btn btn-primary col-5">GUARDAR</button>
                        <button class="btn btn-secondary col-5">CANCELAR</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('name')

@endsection
