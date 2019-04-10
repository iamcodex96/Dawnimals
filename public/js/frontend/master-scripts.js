var isOverlay = false;
function overlayController() {
    if (isOverlay) {
        hideOverlay();
        isOverlay = false;
    } else {
        showOverlay();
        isOverlay = true;
    }
}
$overlay = $('#overlay');
$body=$('body');
function showOverlay() {
    $overlay.show("fast");
    $body.css({
        'overflow-y':'hidden'
    })
};
function hideOverlay() {
    $overlay.hide("fast");
    $body.css({
        'overflow-y':'scroll'
    })
};
function updateIcon(num,id){
    var nav = $('.navegacion');
    var count = 0;
    $('html, body').animate({
        scrollTop: $("#"+id).offset().top
    }, 600);
    nav.children().each(function(){
        if($(this).html()=='<i class="fas fa-circle"></i>'){
            $(this).html('<i class="far fa-circle"></i>')
        }
        if(count==num){
            $(this).html('<i class="fas fa-circle"></i>')
        }
        count++;
    })
}
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

window.onscroll = function() {
    var $navs = $(".navegacion a");
    for (var i = 0; i < $navs.length; i++){
        var navElem = $($navs[i]);
        var nextElem = $($navs[i + 1]);
        if (nextElem.length !== 0 ? ($(navElem.attr("href")).offset().top <= (document.documentElement.scrollTop + 200) && $(nextElem.attr("href")).offset().top >= (document.documentElement.scrollTop + 200)) : $(navElem.attr("href")).offset().top <= (document.documentElement.scrollTop + 200)){
            navElem.html('<i class="fas fa-circle"></i>');
        } else{
            navElem.html('<i class="far fa-circle"></i>');
        }
    }
};
