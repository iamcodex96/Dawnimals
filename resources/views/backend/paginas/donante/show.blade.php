@extends('backend.plantillas.m_show')
@section('titulo','Informacio Donant')
@section('url-index', url('backend/donantes'))
@section('url-form', action('Backend\DonanteController@update',['id'=>$donante->id]))
@section('m_contenido')
<div class="table-responsive" text-align="center">
        <div class="card m-4">
            <div class="row">
                <div class="col-md-1" style="background-color:#99cd32"><h4 class="p-0 m-2" style="writing-mode: vertical-lr;transform: rotate(180deg);color:white">Informacion Personal</h4></div>
                <div class="col-md-11">
                    <div class="row p-3">
                            <div class="col-md-6">
                                <p>{{__('backend.nombre_donante')}} : {{$donante->nombre}}</p>
                                <p>{{__('backend.tipo_donante')}} : {{$donante->tipoDonante->tipo}}</p>
                                <p>{{__('backend.direccion')}} : {{$donante->direccion}}</p>
                                <p>{{__('backend.cp')}} : {{$donante->cp}}</p>
                                <p>{{__('backend.sexo')}} : {{$donante->sexo->sexo}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>CIF/NIF : {{$donante->cif}}</p>
                                <p>{{__('backend.ciudad')}} : {{$donante->poblacion}}</p>
                                <p>{{__('backend.pais')}} : {{$donante->pais}}</p>
                                <p>{{__('backend.correo')}} : {{$donante->correo}}</p>
                                <p>{{__('backend.telefono')}} : {{$donante->telefono}}</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
     <div class="p-4">
            <h3>Donaciones</h3>
            <table class="table table-bordered table-striped">

                    <thead class=" thead-dark">

                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Subtipo</th>
                            <th class="text-center">Centro Receptor</th>
                            <th class="text-center">Coste</th>
                            <th class="text-center">Acción</th>

                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($donaciones as $donacion)

                                    <td class="text-center">{{$donacion->id}}</td>
                                    <td class="text-center">{{$donacion->subtipos->tipos->nombre}}</td>
                                    <td class="text-center">{{$donacion->subtipos->nombre_esp}}</td>
                                    <td class="text-center">{{$donacion->centro->nombre}}</td>
                                    <td class="text-center">{{$donacion->coste}}</td>
                                    <td colspan="2" style="width: 1%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form class="p-0 m-0" action="" method="GET">
                                                @csrf
                                                <button type="submit" data-toggle="tooltip" title="Ver" class="btn btn-primary" data-original-title="Ver"><i class="fa fa-eye"></i></button>
                                            </form>
                                            <form class="p-0 m-0" action="{{ action('Backend\DonacionController@edit',[$donacion->id]) }}" method="GET">

                                                <button type="submit" data-toggle="tooltip" title="Modificar" class="btn btn-warning" data-original-title="Ver"><i class="fa fa-edit"></i></button>
                                            </form>
                                            <form class="p-0 m-0" action="{{ action('Backend\DonacionController@destroy',[$donacion->id]) }}" method="post">
                                            @method('delete') @csrf
                                             <button type="submit" onclick="destroySubmit(this, event, {{$donacion->id}})" data-toggle="tooltip" title="Borrar" class="btn btn-danger"
                                                data-original-title="Ver"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>

     </div>



@endsection
@section('scripts')
<script>
</script>
@endsection

