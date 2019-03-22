@extends('backend.plantillas.master')

@section('titulo','Usuarios')


@section('contenido')
<div class="cabecera mb-4">
    <div class="row">
        <div class="col-md-11 col-sm-12">
            <h1>USUARIOS</h1>
        </div>
        <div class="col-md-1 col-sm-12">
            <a href="{{url('backend/mantenimientos/usuarios/create')}}"class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Agregar donante"> <i class="fa fa-plus"></i> </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Llistat d'usuaris</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Correo</th>
                    <th>Perfil</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->nombre_usuario }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->role->rol }}</td>
                        <td class="text-center">
                            <div class="form-group btn-group">
                                <a href="{{ action("Backend\Mantenimientos\UsuariosController@edit", ["id" => $usuario->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                                <a href="" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
