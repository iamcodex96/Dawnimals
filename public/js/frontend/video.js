var myvideo = document.getElementById('myVideo');

var videoCheckInterval;

$(".controlsPause").hide();

setInterval(function() {
    if (myvideo.paused && !$(".video-links").is(':visible')) {
        $(".video-links").fadeIn();
        $(".video-controls").fadeIn();
        if (myvideo.ended) {
            myvideo.currentTime = 0;
        }

    } else if (!myvideo.paused && $(".video-links").is(':visible')) {
        $(".video-links").fadeOut();


        // $("#myVideo").hover(
        //     function() {
        //         console.log("Entra");
        //         $(".controlsPause").fadeIn();
        //     }, function() {
        //         $(".controlsPause").fadeOut();
        //     }
        //   );
    }

}, 500);

$("#myVideo").click(function() {
    if (!myvideo.paused) {
        myvideo.pause();
    }

})

//Init video links buttons
$(".video-links a").each(function() {
    $(this).click(function(ev) {
        $(".video-controls").fadeOut();
        if (videoCheckInterval) {
            clearInterval(videoCheckInterval);
            videoCheckInterval = null;
        }

        ev.preventDefault();

        var start = parseInt($(this).data("start"));
        var end = parseInt($(this).data("end"));

        myvideo.currentTime = start;
        myvideo.play();

        videoCheckInterval = setInterval(function() {
            if(myvideo.currentTime >= end) {
                myvideo.currentTime = 252;
                myvideo.play();
                if (videoCheckInterval) {
                    clearInterval(videoCheckInterval);
                    videoCheckInterval = null;
                }
            }
        }, 100)

    })
});

$(".video-controls").click(function() {
    myvideo.play();
    $(".video-controls").fadeOut();
})




