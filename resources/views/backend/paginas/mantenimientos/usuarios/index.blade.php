@extends('backend.plantillas.m_index')

@section('titulo','Usuarios')

@section('contenido')
<div class="cabecera mb-4">
    <div class="row">
        <div class="col-md-11 col-sm-12">
            <h1>USUARIS</h1>
        </div>
        <div class="col-md-1 col-sm-12">
            <a href="{{url('backend/mantenimientos/usuarios/create')}}" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top"
                title="Agregar usuario"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Llistat d'usuaris</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Username</th>
                    <th>Correu</th>
                    <th>Perfil</th>
                    <th class="buttons-2"></th>
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
                        <div class="form-group btn-group btn-group-form">
                            <a href="{{ action('Backend\Mantenimientos\UsuariosController@edit', ['id' => $usuario->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                            <form action="{{ action('Backend\Mantenimientos\UsuariosController@destroy', ['id' => $usuario->id])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" onclick="destroySubmit(this, event, '{{ $usuario->nombre }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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
