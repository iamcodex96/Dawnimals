@extends('backend.plantillas.master')
@section("titulo") @yield("titulo")
@endsection

@section('contenido')
<form action="@yield('url-form')" method="post">
    @csrf

    <div class="titulo text-center mb-3">
        <h4>@yield('titulo')</h4>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h4>{{ __('backend.datos') }}</h4>
        </div>
        <div class="card-body row">

            @yield("m_contenido")

        </div>
    </div>
    <div class="botonAceptar text-center mb-5 mt-4">
        <button type="submit" class="btn btn-primary col-5">{{ __('backend.crear') }}</button>
        <a class="btn btn-secondary col-5" href="@yield('url-index')">{{ __('backend.cancelar') }}</a>
    </div>
</form>
@endsection
