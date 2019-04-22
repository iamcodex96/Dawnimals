

$("#botonBajar").on('click', function() {
    var posicion= $("#segundo").offset().top - 45;
    $("html, body").animate({
      scrollTop: posicion

    }, 1000);
  });
