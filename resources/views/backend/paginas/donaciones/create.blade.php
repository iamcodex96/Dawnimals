@extends('backend.plantillas.m_create')
@section('titulo','ALTA DONACIO')
@section('url-index', url('backend/donaciones'))
@section('url-form', action('Backend\DonacionController@store'))
@section('m_contenido')

<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="tipoDonacion" class="control-label">Tipo Donación</label>
    <select id="tipo" class="form-control" name="tipos_id">
            <option value="*"></option>
    </select>
</div>

<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="subtipos_id" class="control-label">Subtipo Donación</label>
    <select id="subtipo" class="form-control" name="subtipos_id">
            <option value="*"></option>
    </select>
</div>


<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="subtipos_id" class="control-label">Centro receptor</label>
    <select class="form-control" name="centros_receptor_id">
        @foreach ($centros as $centro)
        <option value="{{$centro->id}}">{{$centro->nombre}}</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">
    <label for="desc_animal" class="control-label">Donación para:</label>
    <select class="form-control" name="animal_id">
        @foreach($animales as $animal)
            <option value="{{ $animal->id }}" {{ $animal->id == old('animal_id') ? "selected" : "" }}>{{ $animal->nombre }}</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">
    <label for="cp" class="control-label">Usuario Receptor</label>
    <select class="form-control" id="usuario_receptor" name="usuario_receptor">
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ $usuario->id == old('usuario_receptor') ? "selected" : ""}}>{{ $usuario->nombre }}</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">

    <label for="subtipos_id" class="control-label">Centro destino</label>
    <select class="form-control" name="centros_desti_id">
        @foreach ($centros as $centro)
        <option value="{{$centro->id}}">{{$centro->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Donante</label>
    <select class="form-control" id="donantes_id" name="donantes_id">
        <option value="">{{ __("backend.anonimo") }}</option>
        @foreach($donantes as $donante)
            <option value="{{ $donante->id }}" {{ $donante->id == old('donantes_id') ? "selected" : "" }}>{{$donante->nombre }} - ({{  $donante->id }})</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Coste</label>
    <input type="number" step="any" class="form-control" id="coste" name="coste" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Unidades</label>
    <input type="number" class="form-control" id="unidades" name="unidades" placeholder="">
</div>

<div class="form-group float-left col-md-6">
    <label for="desc_animal" class="control-label">Tipo Unidad</label>
    <select class="form-control" name="unidades_tipo">
                    <option value="Uni">Unidades</option>
                    <option value="KG">Quilos</option></option>
                    <option value="Otros">Litros</option>
                    <option value="Otros">Otros</option>
                </select>
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Peso</label>
    <input type="number" class="form-control" id="peso" name="peso" placeholder="">
</div>


<div class="form-group float-left col-md-6">
    <label for="desc_animal" class="control-label">Es coordinada</label>
    <select class="form-control" name="es_coordinada">
                    <option value="1">Sí</option>
                    <option value="0">No</option></option>
                </select>
</div>


<div class="form-group float-left col-md-6">
    <label for="cp" class="control-label">Factura</label>
    <input type="text" class="form-control" id="ruta_factura" name="ruta_factura" placeholder="cambiar por fichero">
</div>


@endsection

@section('scripts')
@parent
    <script>
        idioma = "{{App::getLocale()}}";
    </script>
    <script src="{{ asset('js/api/donacionesAPI.js') }}"></script>
@endsection
