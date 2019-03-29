@extends('backend.plantillas.m_index')
@section('titulo','Perfils')
@section('subtitulo','Llistat de perfils')
@section('url-crear', url('backend/mantenimientos/perfiles/create'))

@section('m_contenido')

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Perfil</th>
            <th class="buttons-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->rol }}</td>
            <td class="text-center">
                <div class="form-group btn-group btn-group-form">
                    <a href="{{ action('Backend\Mantenimientos\PerfilesController@edit', ['id' => $role->id]) }}" class="btn btn-info"><span class="fa fa-edit"></span></a>
                    <form action="{{ action('Backend\Mantenimientos\PerfilesController@destroy', ['id' => $role->id])}}" method="post">
                        @method("delete") @csrf
                        <button type="submit" onclick="destroySubmit(this, event, '{{ $role->rol }}')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
