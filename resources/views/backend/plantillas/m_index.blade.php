@extends('backend.plantillas.master')
@section("titulo") @yield("titulo")
@endsection

@section('contenido')

    @yield('contenido')
@endsection


@section("modals")
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modalTitulo"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desitges esborrar aquest registre?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnAceptar">ACEPTAR</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script>
    var elemento;

        function destroySubmit(element, event, titulo){
            event.preventDefault();

            $("#modalDelete .modalTitulo").html(titulo);
            $("#modalDelete").modal("show");

            elemento = element;
        }

        $("#modalDelete .btnAceptar").on("click", function(){
            elemento.form.submit();
        });

</script>
@endsection
