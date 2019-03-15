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
    }, 1000);
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
