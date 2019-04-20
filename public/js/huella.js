

$("#botonBajar").on('click', function() {
    var posicion= $("#texto").offset().top;
    $("html, body").animate({
      scrollTop: posicion

    }, 1000);
  });
