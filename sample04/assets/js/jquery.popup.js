$(document).ready(function() {
    $('.apply-btn').on('click', function(){
        $('#call-screen').removeClass("hideScreen");
        $('#call-screen').addClass("showScreen");
    });

    $('#call-screen').on('click', function(){
        $('#call-screen').removeClass("showScreen");
        $('#call-screen').addClass("hideScreen");
    });

    $('.send-btn').on('click', function(){
        $('#thanks-screen').removeClass("hideScreen");
        $('#thanks-screen').addClass("showScreen");
    });

    $('#thanks-screen').on('click', function(){
        $('#thanks-screen').removeClass("showScreen");
        $('#thanks-screen').addClass("hideScreen");
    });
    $('#msg-screen').on('click', function(){
        $('#msg-screen').removeClass("showScreen");
        $('#msg-screen').addClass("hideScreen");
    });
});    
  