$(document).ready(function()
{
    var
        discover = $('.discover'),
        solo = $('.solo'),
        logo = $('.logo'),
        connexion = $('.connexion, .identification'),

        tl = new TimelineLite();

    tl
        .from(discover,5, {y:0, autoAlpha: 0, ease:Power1.aseOut}, 2)
        .from(solo,5, {y:0, autoAlpha: 0, ease:Power1.aseOut}, 8)
        .from(logo,5, {y:0, autoAlpha: 0, ease:Power1.aseOut}, 14)
        .from(connexion,5, {y:0, autoAlpha: 0, ease:Power1.aseOut}, 16);


    $('.discover').fadeOut(40000).delay(70000);
    $('.solo').fadeOut(20000).delay(70000);


});




