function BackgroundCover(){
    height = $(window).height();
    $('body').css({
        'height': height
    })
}

$(document).ready(function(){
    BackgroundCover();
    $(window).resize(function(){
        BackgroundCover();
    });

    $('.identification').click(function(){
        $('#modale').fadeIn(600);
        $('.connexion').fadeOut(300);
        $('.logo').fadeOut(300);
        $('.identification').fadeOut(300);
    });

    $('.cross').click(function(){
        $('#modale').fadeOut(300);
        $('.connexion').fadeIn(600);
        $('.logo').fadeIn(600);
        $('.identification').fadeIn(600);
    });

    $('.new-account').click(function(){
        $('#modale').fadeOut(300);
        setTimeout(function(){
            $('#modale-inscription').fadeIn(600);
        }, 300);
    });

    $('.cross-inscr').click(function(){
        $('#modale-inscription').fadeOut(300);
        $('.connexion').fadeIn(600);
        $('.logo').fadeIn(600);
        $('.identification').fadeIn(600);
    });

    $(function() {
        $(".any-class").jCarouselLite({
            btnNext: ".suivant",
            btnPrev: ".prev"
        });
    });

});

