@extends('frontend.plantillas.master')

@section('css_propio')
<link rel="stylesheet" href="{{ asset('css/frontend/quien-somos.css') }}">
@endsection

@section('titulo')
    Landing
@endsection

@section('contenido')
<main class="container-fluid">
    <img src="{{ asset('img/quien-somos/img-quien-somos-8.png') }}" class="img-fluid" alt="Responsive image">
    <div class="text-center m-5">
        <h1>Dona dinero</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit cras varius sollicitudin, taciti vel mollis nunc pretium netus sodales volutpat luctus conubia neque, convallis orci suspendisse leo integer libero commodo inceptos curae. Velit pellentesque curabitur eget aliquet cursus lectus ad maecenas suscipit pulvinar congue luctus ultricies, curae porta vulputate lobortis neque hac porttitor potenti dui senectus sollicitudin integer. Condimentum diam eu fermentum nam metus platea neque in mattis tempus dis tempor, ad sed molestie mi porta blandit bibendum tortor arcu proin hendrerit.

                Eros tincidunt duis tempor ante potenti molestie libero blandit commodo euismod per litora sapien, quis mattis turpis maecenas elementum cum suscipit quisque platea eu orci. Pharetra purus consequat vitae tempus mi proin maecenas nulla, dictumst at eu posuere condimentum aliquam primis etiam, vel augue quisque cubilia euismod netus vestibulum. Laoreet varius accumsan elementum per vehicula purus phasellus quam, nibh fames maecenas donec ligula felis euismod duis, at parturient turpis egestas auctor fermentum integer.</p>
    </div>
    <div class="row p-5">
        <div class="col-md-6">
                <img src="{{ asset('img/quien-somos/antua-pics-01.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-md-6">
            <button class="btn btn-lg btn-primary fb"><i class="fab fa-facebook-f"></i> Dona en Facebook</button>
            <button class="btn btn-lg btn-success fb"><i class="fas fa-hand-holding-usd"></i> Participa en els reptes</button>
        </div>
    </div>
</main>

@endsection

@section('js_loaded')
<script src="{{ asset('./js/frontend/landing.js') }}"></script>
<script>
    var $spam = $('#spam');
    console.log($spam.position().top);
    $(window).scroll(function(){
        console.log($(this).scrollTop());
    })

    function showOnScroll(divId){
        var divMostrar = $('#'+divId);
    }

</script>
@endsection
