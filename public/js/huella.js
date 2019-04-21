

$("#botonBajar").on('click', function() {
    var posicion= $("#segundo").offset().top - 35;
    $("html, body").animate({
      scrollTop: posicion

    }, 1000);
  });
