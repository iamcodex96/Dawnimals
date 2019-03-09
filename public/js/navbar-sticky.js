var navBar = $("#topNav");
var textoCentral = $("#spam")
var hdrHeight = $("header").height();

$(window).scroll(function() {
  if( $(this).scrollTop() >= hdrHeight) {
    navBar.addClass("sticky-top shadow");
    textoCentral.html('<h3>SPAM</h3>');

  } else {
    navBar.removeClass("sticky-top shadow");
    textoCentral.html('<img src="https://via.placeholder.com/150">');
  }
});
