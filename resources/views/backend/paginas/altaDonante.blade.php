@extends('backend.plantillas.master')

@section('titulo','donaciones')


@section('contenido')
<div class="titulo text-center mb-3">

    <h4>ALTA DONANTE</h4>

</div>


                    <div id="container" class="container">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 ">
                <form>
                    <h4>Datos personales</h4>

                        <div class="form-group mt-3"> <!-- State Button -->
                            <label for="tipoD" class="control-label">Tipo de donante</label>
                            <select class="form-control" id="tipoD">
                                <option value="*"></option>
                                <option value="PAR">Particular</option>
                                <option value="EMP">Empresa</option>
                                <option value="ESC">Escuela</option>
                                <option value="ANON">Anónimo</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="full_name_id" class="control-label">Nombre o Razón social</label>
                            <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="cif" class="control-label">CIF/NIF</label>
                            <input type="text" class="form-control" id="cif" name="cif" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="control-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="ciudad" class="control-label">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="cp" class="control-label">Código Postal</label>
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="pais" class="control-label">País</label>
                            <select class="form-control" id="pais">
                                <option value="ES">España</option>
                                <option value="FR">Francia</option>
                                <option value="PT">Portugal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sexo" class="control-label">Sexo</label>
                            <select class="form-control" id="sexo">
                                    <option value="*"></option>
                                    <option value="">Mujer</option>
                                    <option value="">Hombre</option>
                                    <option value="">Otro</option>
                            </select>
                        </div>



                    <h4>Datos de contacto </h4>

                            <div class="form-group mt-3">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                            </div>

                    <h4>Información adicional</h4>

                            <div class="form-group mt-3">
                                <label for="tieneAnimales" class="control-label">¿Tiene animales?</label>
                                <select class="form-control" id="tieneAnimales">
                                    <option value="*"></option>
                                    <option value="S">Sí</option>
                                    <option value="N">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="esHabitual" class="control-label">¿Es donante habitual?

                                </label>
                                    <select class="form-control" id="esHabitual">
                                        <option value="*"></option>
                                        <option value="S">Sí</option>
                                        <option value="N">No</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                    <label for="esHabitual" class="control-label">¿Ha adoptado alguna vez?

                                    </label>
                                        <select class="form-control" id="esHabitual">
                                            <option value="*"></option>
                                            <option value="S">Sí</option>
                                            <option value="N">No</option>
                                        </select>
                                </div>


                            <div class="form-group">
                                    <label for="esColaborador" class="control-label">¿Es colaborador?

                                    </label>
                                        <select class="form-control" id="esColaborador">
                                            <option value="*"></option>
                                            <option value="S">Sí</option>
                                            <option value="N">No</option>
                                        </select>
                            </div>

                            <div class="form-group">
                                    <label for="tipoColaborador" class="control-label">Tipo de colaboración

                                    </label>
                                        <select class="form-control" id="tipoColaborador">
                                            <option value="*"></option>
                                            <option value="S">no sé</option>
                                            <option value="N">no sé</option>
                                        </select>
                            </div>

                            <div class="form-group">
                                <label for="vinculo" class="control-label">Vínculo Entidad</label>
                                <select class="form-control" id="vinculo">
                                        <option value="*"></option>
                                        <option value="">Socio</option>
                                        <option value="">Patrocinador</option>
                                        <option value="">Teamer</option>
                                        <option value="">Adoptante</option>
                                        <option value="">Voluntario acogidas</option>
                                </select>
                            </div>



                    <div class="form-group">
                            <label class="control-label">Fecha Alta / **ESTO DEBERÍA AUTOGENERARSE**</label>
                            <!--pendiente saber de qué, alta o última donación-->
                            <input class="form-control" name="filter_donante_fecha"id="input-donante-fecha" type="date">
                        </div>

                    <div class="botonAceptar text-center mb-5">

                        <button type="submit" class="btn btn-primary">GUARDAR</button>

                    </div>



                </form>
            </div>
        </div>
    </div>

@endsection
