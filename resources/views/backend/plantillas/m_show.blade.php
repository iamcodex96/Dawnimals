@extends('backend.plantillas.master')
@section("titulo") @yield("titulo")
@endsection

@section('contenido')
<form action="@yield('url-form')" method="post">
    @method("put")
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
</form>
@endsection
