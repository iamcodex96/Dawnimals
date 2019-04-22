@extends('backend.plantillas.m_edit')
@section('titulo','EDITAR DONANT')
@section('url-index', url('backend/donantes'))
@section('url-form', action('Backend\DonanteController@update',['id'=>$donante->id]))
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
    <label for="full_name_id" class="control-label">{{__('backend.nombre')}}</label>
    <input type="text" class="form-control" id="full_name_id" name="full_name" value="{{ $donante->nombre }}">
</div>

<div class="form-group float-left col-md-6">
    <label for="cif" class="control-label">CIF/NIF</label>
    <input type="text" class="form-control" id="cif" name="cif" value="{{ $donante->cif }}">
</div>

<div class="form-group float-left col-md-6">
    <label for="direccion" class="control-label">{{__('backend.direccion')}}</label>
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $donante->direccion }}">
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">{{__('backend.ciudad')}}</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $donante->poblacion }}">
</div>

<div class="form-group float-left col-md-6">
    <label for="cp" class="control-label">{{__('backend.cp')}}</label>
    <input type="text" class="form-control" id="cp" name="cp" value="{{ $donante->cp }}">
</div>


<div class="form-group float-left col-md-6">
    <label for="pais" class="control-label">{{__('backend.pais')}}</label>
    <select id="pais" class="form-control" name="pais">
    </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="sexo" class="control-label">{{__('backend.sexo')}}</label>
    <select class="form-control" name="sexo">
            @foreach ($sexos as $sexo)
            <option value="{{$sexo->id}}"  {{$donante->sexos_id == $sexo->id ? 'selected' :'' }} >{{$sexo->sexo}}</option>
            @endforeach
        </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="email" class="control-label">{{__('backend.correo')}}</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ $donante->correo }}">
</div>

<div class="form-group float-left col-md-6">
    <label for="telefono" class="control-label">{{__('backend.telefono')}}</label>
    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $donante->telefono }}">
</div>

<hr class="w-100">

<div class="form-group float-left col-md-6">
    <label for="tieneAnimales" class="control-label">{{__('backend.donante_animales')}}</label>
    <select class="form-control" name="tieneAnimales">
                <option value="*"></option>
                <option {{$donante->tiene_aninales == 1 ? 'selected' :'' }} value="1">Sí</option>
                <option  {{$donante->tiene_aninales == 0 ? 'selected' :'' }} value="0">No</option>
            </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="esHabitual" class="control-label">{{__('backend.habitual')}}?</label>
    <select class="form-control" name="esHabitual">
                    <option value="*"></option>
                    <option  {{$donante->es_habitual == 1 ? 'selected' :'' }} value="1">Sí</option>
                    <option {{$donante->es_habitual == 0 ? 'selected' :'' }} value="0">No</option>
                </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="aAdoptado" class="control-label">{{__('backend.adopta')}}</label>
    <select class="form-control" name="aAdoptado">
                        <option value="*"></option>
                        <option {{$donante->spam == 1 ? 'selected' :'' }} value="1">Sí</option>
                        <option {{$donante->spam == 0 ? 'selected' :'' }} value="0">No</option>
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

{{-- <div class="form-group float-left col-md-6">
    <label for="esColaborador" class="control-label">{{__('backend.colaborador')}}</label>
    <select class="form-control" name="esColaborador">
                        <option value="*"></option>
                        <option {{$donante->es_colaborador == 1 ? 'selected' :'' }} value="1">Sí</option>
                        <option {{$donante->es_colaborador == 0 ? 'selected' :'' }} value="0">No</option>
                    </select>
</div> --}}


<div class="form-group float-left col-md-6">
        <div class="custom-control custom-checkbox">
                <input type="checkbox" name="spam" class="custom-control-input" id="customCheck1"  {{$donante->spam ? 'checked' :'' }}>
                <label class="custom-control-label" for="customCheck1">{{__('backend.recibir_spam')}}</label>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    restcountries.getAll(function(countries){
            countries.forEach(function(country){
                var $country = $("<option></option>").val(country.code).html(country.nombre);
                if(country.code == "{{$donante->pais }}"){
                    $country.attr("selected", "");
                }
                $("#pais").append($country);
            });
        });
</script>
@endsection

