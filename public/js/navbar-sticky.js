var navBar = $("#topNav");
var textoCentral = $("#spam")
var hdrHeight = $("header").height();


$(window).scroll(function() {
  if( $(this).scrollTop() > hdrHeight + 50) {
    navBar.addClass("navScrolled");
    textoCentral.html('<h3>SPAM</h3>');
  } else {
    navBar.removeClass("navScrolled");
    textoCentral.html('<img src="https://via.placeholder.com/150">');
  }
});
