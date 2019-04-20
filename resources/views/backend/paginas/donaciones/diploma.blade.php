@extends('backend.plantillas.master')
@section('titulo', __('backend.diploma'))
@section("css")
<link rel="stylesheet" href="{{ asset('css/backend/diploma.css') }}">
@endsection

@section('contenido')

<div class="cabecera mb-2">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <h1>@yield('titulo')</h1>
        </div>
        <div class="col-md-3 col-sm-12 d-flex justify-content-end align-items-center">
            <button data-toggle="modal" data-target="#modalEditar" class="btn btn-warning mr-2"><span class="fa fa-edit"></span></button>
            <button onclick="exportaDiploma()" class="btn btn-primary"><span class="fa fa-certificate"></span></button>
        </div>
    </div>
</div>

<div id="diploma" class="card card-body text-center m-2">
    <div class="row">

        <div class="col-12 mb-4">
            <img id="logo" src="{{ asset('img/Logo_OK.png') }}">
        </div>

        <div class="col-12 mb-5 text-white d-flex justify-content-center align-items-center">
            <h3 class="py-2" id="titulo-donacion">{{ __('backend.diploma_donacion') }}</h3>
        </div>

        <h4 class="col-12">{{ __('backend.diploma_agradecimiento') }}</h4>

        <div class="col-12 mb-3 d-flex align-items-center justify-content-center">
            <h2 id="diploma_nombre">
                {{$donacion->donantes != null ? $donacion->donantes->nombre : __('backend.anonimo') }}
            </h2>
        </div>

        <h4 class="col-12">
            {{ __('backend.diploma_por_donacion', ['cantidad' => $donacion->peso, 'unidad' => $donacion->subtipos->tipo_unidad, 'tipo'
            => \App::getLocale() == 'ca' ? $donacion->subtipos->nombre_cat : $donacion->subtipos->nombre_esp]) }}
            <br> {{ __('backend.diploma_cuidando') }}
        </h4>

        <div class="col-12 my-4 row">
            <div class="col text-left"><img id="daina" src="{{ asset('img/daina.png')}}"></div>
            <div class="col"><img class="shadow rounded-circle" id="sello" src="{{ asset('img/SPAMI_RETO_SS.png') }}"></div>
            <div class="col"></div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('backend.diploma_modificar') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="txtNombreEditar" value="{{$donacion->donantes != null ? $donacion->donantes->nombre : __('backend.anonimo') }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"> {{ __('backend.aceptar') }}</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    $('#txtNombreEditar').keyup(function (){
        $("#diploma_nombre").html($(this).val());
    });


    function exportaDiploma(){

        // Transforma el div de diploma en un canvas
        html2canvas(document.querySelector("#diploma")).then(canvas => {
            download(canvas, "Diploma - " + $('#txtNombreEditar').val() + ".png");
        });

        // Crea un evento de descarga
        function download(canvas, filename) {
          var lnk = document.createElement('a'), e;

          lnk.download = filename;

          lnk.href = canvas.toDataURL("image/png;base64");

          if (document.createEvent) {
            e = document.createEvent("MouseEvents");
            e.initMouseEvent("click", true, true, window,
                             0, 0, 0, 0, 0, false, false, false,
                             false, 0, null);

            lnk.dispatchEvent(e);
          } else if (lnk.fireEvent) {
            lnk.fireEvent("onclick");
          }
        }
    }

</script>
@endsection
