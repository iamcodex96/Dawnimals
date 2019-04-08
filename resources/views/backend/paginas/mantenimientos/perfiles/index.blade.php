@extends('backend.plantillas.m_index')
@section('titulo', __('backend.perfiles'))
@section('subtitulo', __('backend.listado_perfiles'))
@section('url-crear',
url('backend/mantenimientos/perfiles/create'))
@section('m_contenido')

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr class="filtro collapse">
            <form action="{{ action('Backend\Mantenimientos\PerfilesController@index')}}" method="GET">
                <td>
                    <input type="text" class="form-control" name="filtros[rol]" id="rol" value="{{ $filtros['rol'] }}">
                    <input type="submit" name="submit" class="d-none" id="exportarExcel" value="excel">
                </td>
                <td></td>
            </form>
        </tr>
        <tr>
            <th>{{ __('backend.perfil') }}</th>
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
                        <button type="submit" onclick="destroySubmit(this, event, '{{ $role->rol }}')" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $roles->appends($_GET)->links() }}

@endsection

@section("scripts") @parent
<script>
    // $(".filtro input").on('change', function(){
    //     this.form.submit();
    // });

</script>
@endsection
