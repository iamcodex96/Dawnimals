@extends('backend.plantillas.m_create')
@section('titulo','ALTA DONACIO')
@section('url-index', url('backend/donaciones'))
@section('url-form', action('Backend\DonacionController@store'))
@section('m_contenido')

<div class="form-group float-left col-md-6">
    <!-- State Button -->
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
    <select class="form-control" name="pais" id="pais">

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

<div class="form-group float-left col-md-6">
    <label for="email" class="control-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="telefono" class="control-label">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
</div>

<hr class="w-100">

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
@endsection

@section('scripts')
<script>
    restcountries.getAll(function(countries){
            countries.forEach(function(country){
                var $country = $("<option></option>").val(country.code).html(country.nombre);

                if (country.code == restcountries.defaultCode){
                    $country.attr("selected", "");
                }
                $("#pais").append($country);
            });
        });
</script>
@endsection
