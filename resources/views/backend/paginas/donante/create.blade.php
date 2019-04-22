@extends('backend.plantillas.m_create')
@section('titulo','ALTA DONANT')
@section('url-index', url('backend/donantes'))
@section('url-form', action('Backend\DonanteController@store'))
@section('m_contenido')

<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="tipoD" class="control-label">{{__('backend.tipo_donante')}}</label>
    <select class="form-control" name="tipoD">
                @foreach ($tipodonantes as $td)
                <option value="{{$td->id}}">{{$td->tipo}}</option>
                @endforeach
            </select>
</div>
<div class="form-group float-left col-md-6">
    <label for="full_name_id" class="control-label">{{__('backend.nombre_donante')}}</label>
    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
</div>
<div class="form-group float-left col-md-6">
    <label for="cif" class="control-label">CIF/NIF</label>
    <input type="text" class="form-control" id="cif" name="cif" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="direccion" class="control-label">{{__('backend.direccion')}}</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">{{__('backend.ciudad')}}</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="cp" class="control-label">{{__('backend.cp')}}</label>
    <input type="text" class="form-control" id="cp" name="cp" placeholder="">
</div>


<div class="form-group float-left col-md-6">
    <label for="pais" class="control-label">{{__('backend.pais')}}</label>
    <select class="form-control" name="pais" id="pais">

    </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="sexo" class="control-label">{{__('backend.sexo')}}</label>
    <select class="form-control" name="sexo">
                    @foreach ($sexos as $sexo)
                    <option value="{{$sexo->id}}">{{$sexo->sexo}}</option>
                    @endforeach
                </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="email" class="control-label">{{__('backend.correo')}}</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="telefono" class="control-label">{{__('backend.telefono')}}</label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
</div>

<hr class="w-100">

<div class="form-group float-left col-md-6">
    <label for="tieneAnimales" class="control-label">{{__('backend.donante_animales')}}</label>
    <select id="tieneA" class="form-control" name="tieneAnimales">
                    <option value="*"></option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
</div>
<div id="animal" class="form-group float-left col-md-6">
    <label for="animal_id" class="control-label">{{__('backend.tipo_animal')}}</label>
    <select class="form-control" name="animal_id">
            @foreach ($animales as $animal)
            <option value="{{$animal->id}}">{{$animal->nombre}}</option>
            @endforeach
    </select>
</div>
<div class="form-group float-left col-md-6">
    <label for="esHabitual" class="control-label">¿{{__('backend.habitual')}}?</label>
    <select class="form-control" name="esHabitual">
                        <option value="*"></option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="aAdoptado" class="control-label">¿{{__('backend.adopta')}}

                    </label>
    <select class="form-control" name="aAdoptado">
                            <option value="*"></option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
</div>


{{-- <div class="form-group float-left col-md-6">
    <label for="esColaborador" class="control-label">{{__('backend.colaborador')}}

                    </label>
    <select class="form-control" name="esColaborador">
                            <option value="*"></option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
</div> --}}



<div class="form-group float-left col-md-6">
    <label for="vinculo" class="control-label">{{__('backend.vinculo')}}</label>
    <select class="form-control" name="vinculo">
                        <option value="*"></option>
                        <option value="Socio">Socio</option>
                        <option value="Patrocinador">Patrocinador</option>
                        <option value="Teamer">Teamer</option>
                        <option value="Adoptante">Adoptante</option>
                        <option value="Voluntario">Voluntario acogidas</option>
                </select>
</div>
<div class="form-group float-left col-md-6 mt-4">
        <div class="custom-control custom-checkbox">
                <input type="checkbox" name="spam" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">{{__('backend.recibir_spam')}}</label>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    var inputTieneA = $('#tieneA');
    var inputAnimales = $('#animal');
    inputAnimales.hide();
    inputTieneA.on('change',function(){
        console.log(inputTieneA.val());
        if(inputTieneA.val()==1){
            inputAnimales.show();
        }else if(inputTieneA.val()!=1){
            inputAnimales.hide();
        }
    })
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
