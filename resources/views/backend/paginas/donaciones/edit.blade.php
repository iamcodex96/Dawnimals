@extends('backend.plantillas.m_edit')
@section('titulo','EDITAR DONACION')
@section('url-index', url('backend/donaciones'))
@section('url-form', action('Backend\DonacionController@update',['id'=>$donacion->id]))
@section('m_contenido')

<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="tipoDonacion" class="control-label">Tipo Donación</label>
    <select id="tipo" class="form-control" name="tipos_id">
        @foreach ($tiposDonacion as $td)
        <option value="{{$td->id}}" {{$donacion->subtipos->tipos_id == $td->id ? 'selected' :'' }}>{{$td->nombre}}</option>
        @endforeach
        </select>
</div>

<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="subtipos_id" class="control-label">Subtipo Donación</label>
    <select id="subtipo" class="form-control" name="subtipos_id">
        @foreach ($subtiposDonacion as $td)
        <option value="{{$td->id}}" {{$donacion->subtipos_id == $td->id ? 'selected' :'' }}>{{$td->nombre_esp}}</option>
        @endforeach
        </select>
</div>


<div class="form-group float-left col-md-6">
    <!-- State Button -->
    <label for="subtipos_id" class="control-label">Centro receptor</label>
    <select class="form-control" name="centros_receptor_id">
        @foreach ($centros as $centro)
        <option value="{{$centro->id}}" {{$donacion->centros_receptor_id == $centro->id ? 'selected' :'' }}>{{$centro->nombre}}</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">
    <label for="desc_animal" class="control-label">Donación para:</label>
    <select class="form-control" name="animal_id">
        @foreach($animales as $animal)
            <option value="{{ $animal->id }}" {{ $animal->id == $donacion->animales->first()->id ? "selected" : "" }}>{{ $animal->nombre }}</option>
        @endforeach
    </select>
</div>


{{-- este tendrá que asignarse según el usuario logado!!!! --}}

<div class="form-group float-left col-md-6">
    <label for="cp" class="control-label">Usuario Receptor</label>
    <select class="form-control" id="usuario_receptor" name="usuario_receptor">
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ $usuario->id == $donacion->usuario_receptor ? "selected" : ""}}>{{ $usuario->nombre }}</option>
        @endforeach
    </select>
</div>


<div class="form-group float-left col-md-6">

    <label for="subtipos_id" class="control-label">Centro destino</label>
    <select class="form-control" name="centros_desti_id">
        @foreach ($centros as $centro)
        <option value="{{$centro->id}}" {{$donacion->centros_desti_id == $centro->id ? 'selected' :'' }}>{{$centro->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group float-left col-md-6">
        <label for="ciudad" class="control-label">Donante</label>
        <select class="form-control" id="donantes_id" name="donantes_id">
            @foreach($donantes as $donante)
            <option value="{{ $donante->id }}" {{ $donante->id == $donacion->donantes_id ? "selected" : "" }}>{{$donante->nombre }} - ({{  $donante->id }})</option>
            @endforeach
        </select>
    </div>


<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Coste</label>
    <input type="number" step="any" class="form-control" id="coste" name="coste" value="{{$donacion->coste}}">
</div>

<div class="form-group float-left col-md-6">
    <label for="ciudad" class="control-label">Unidades</label>
    <input type="number" class="form-control" id="unidades" name="unidades" value="{{$donacion->unidades}}">
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
    <input type="number" class="form-control" id="peso" name="peso" value="{{$donacion->peso}}">
</div>


<div class="form-group float-left col-md-6">
    <label for="desc_animal" class="control-label">Es coordinada</label>
    <select class="form-control" name="es_coordinada">
        <option {{$donacion->es_coordinada == 1 ? 'selected' :'' }} value="1">Sí</option>
        <option {{$donacion->es_coordinada == 0 ? 'selected' :'' }} value="0">No</option></option>
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
