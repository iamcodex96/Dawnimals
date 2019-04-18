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
    <div class="row">
        <div class="col-md-9">
            <input id="d-id" type="hidden" name="donantes_id" id="donantes_id">
            <input id="d-nombre" type="text" class="form-control" id="donantes_nombre" readonly>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#modalBuscarDonante"><i class="fas fa-search"></i></a>
            <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#modalCreateDoanante"><i class="fas fa-plus"></i></a>
        </div>
    </div>


    <!--
    <select class="form-control" id="donantes_id" name="donantes_id">
        <option value="">{{ __("backend.anonimo") }}</option>
        @foreach($donantes as $donante)
            <option value="{{ $donante->id }}" {{ $donante->id == old('donantes_id') ? "selected" : "" }}>{{$donante->nombre }} - ({{  $donante->id }})</option>
        @endforeach
    </select>
    -->
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

<div class="modal fade" id="modalBuscarDonante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1200px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modalTitulo">Donantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row">
                        <div class="form-group float-left col-md-6">
                            <label for="cif" class="control-label">DNI/CIF</label>
                            <input type="text" id="input-cif" class="form-control">
                        </div>
                        <div class="form-group float-left col-md-6">
                            <label for="cp" class="control-label">Correo</label>
                            <input type="text" id="input-correo" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">Filtrar</button>
                </div>

                <hr>
            <div class="table-responsive text-center">
                <table class="table table-striped">
                    <thead class=" thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{__('backend.nombre_donante')}}</th>
                            <th class="text-center">{{__('backend.direccion')}}</th>
                            <th class="text-center">{{__('backend.telefono')}}</th>
                            <th class="text-center">{{__('backend.correo')}}</th>
                            <th colspan="2" class="text-center">{{__('backend.accion')}}</th>
                        </tr>
                    </thead>
                    <tbody id="donanteTableBody">
                    </tbody>
                </table>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnAceptar">{{ __('backend.aceptar') }}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.cancelar') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCreateDoanante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 1200px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modalTitulo">Nuevo Donante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="form-group col-md-6">
                            <!-- State Button -->
                            <label for="tipoD" class="control-label">{{__('backend.tipo_donante')}}</label>
                            <select id="selTipoDonante" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <!-- State Button -->
                            <label for="tipoD" class="control-label">{{__('backend.sexo')}}</label>
                            <select id="selSexos" class="form-control">
                            </select>
                        </div>
                        <div class="form-group float-left col-md-6">
                            <label for="full_name_id" class="control-label">{{__('backend.nombre_donante')}}</label>
                            <input type="text" class="form-control" id="nombreD" name="full_name" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cif" class="control-label">CIF/NIF</label>
                            <input type="text" class="form-control" id="cif" name="cif" placeholder="">
                        </div>
                        <div class="form-group float-left col-md-12">
                            <label for="email" class="control-label">{{__('backend.correo')}}</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="guardarDonante()" class="btn btn-primary btnAceptar">{{ __('backend.guardar') }}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.cancelar') }}</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
    <script>
        idioma = "{{App::getLocale()}}";
    </script>
    <script src="{{ asset('js/api/donacionesAPI.js') }}"></script>
    <script>
        function setDonante(id,nombre){
            var inputId = $('#d-id');
            var inputNombre = $('#d-nombre');
            inputId.val(id);
            inputNombre.val(nombre);
        }
    </script>
@endsection
