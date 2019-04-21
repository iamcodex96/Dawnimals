var myvideo = document.getElementById('myVideo'),
   // playbutton = document.getElementById('intro'),
    jumplink = document.getElementById('intro');
    jumplink1 = document.getElementById('adopcion');
    jumplink2 = document.getElementById('donacion');
    jumplink3 = document.getElementById('voluntario');
    jumplink4 = document.getElementById('todo');


//INTRO
jumplink.addEventListener("click", function (event) {

    event.preventDefault();

    myvideo.currentTime = 0;
    myvideo.play();


    myvideo.addEventListener("timeupdate", function(){

        if(this.currentTime >= 64) {
            this.currentTime = 252;
            this.play();
        }
    });

}, false);


//ADOPCIÓN
jumplink1.addEventListener("click", function (event) {
    event.preventDefault();

    myvideo.currentTime = 65;
    myvideo.play();

}, false);


//DONACIÓN
jumplink2.addEventListener("click", function (event) {
    event.preventDefault();

    myvideo.currentTime = 126;
    myvideo.play();

}, false);



//VOLUNTARIO
jumplink3.addEventListener("click", function (event) {
    event.preventDefault();

    myvideo.currentTime = 191;
    myvideo.play();
}, false);



//VER TODO
jumplink4.addEventListener("click", function (event) {
    event.preventDefault();
    myvideo.currentTime = 0;
    myvideo.play();
}, false);


