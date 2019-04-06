@if (Session::has("error"))
    <div class="alert alert-danger sticky-top" role="alert">
        {{ Session::get("error") }}
    </div>
@endif

@if (Session::has("info"))
    <div class="alert alert-info sticky-top" role="alert">
        {{ Session::get("info") }}
    </div>
@endif
