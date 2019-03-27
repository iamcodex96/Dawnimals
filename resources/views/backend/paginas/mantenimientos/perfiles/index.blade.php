@extends('backend.plantillas.m_index')

@section('titulo','Perfils')

@section('contenido')
<div class="cabecera mb-4">
    <div class="row">
        <div class="col-md-11 col-sm-12">
            <h1>PERFILS</h1>
        </div>
        <div class="col-md-1 col-sm-12">
            <a href="{{url('backend/mantenimientos/perfiles/create')}}" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top"
                title="Agregar perfil"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Llistat de Perfils</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Perfil</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->rol }}</td>
                    <td class="text-center">
                        <div class="form-group btn-group">
                            <a href="{{ action('Backend\Mantenimientos\PerfilesController@edit', ['id' => $role->id ]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                            <form action="{{ action('Backend\Mantenimientos\PerfilesController@destroy', ['id' => $role->id])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" onclick="destroySubmit(this, event, '{{ $role->rol }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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
