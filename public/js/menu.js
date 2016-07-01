
$(document).ready(function() {

    var nav = $('nav');
    var menu = $('.menu');
    var menuContainer = $('.menu-container');
    var subMenu = $('.submenu');
    var toggle = $('.toggle');
    var subToggle = $('.has-children span');
    var back = '<div class="hide-submenu"></div>';
    var subHide = $(back);

// Toggle menu
    toggle.on("click", function () {
        nav.toggleClass('is-visible');
        if (menu.hasClass('visually-hidden')) {
            menu.toggleClass('visually-hidden is-visible')
        } else {
            menu.removeClass('is-visible');
            // Wait for CSS animation
            setTimeout(function () {
                nav.removeClass('view-submenu');
                menu.addClass('visually-hidden');
            }, 200);
        }
    });

// Add submenu hide bar
    subHide.prependTo(subMenu);
    var subHideToggle = $('.hide-submenu');

// Show submenu
    subToggle.on("click", function () {
        nav.addClass('view-submenu');
        // Hide all the submenus...
        subMenu.hide();
        // ...except for the one being called
        $(this).parents('li').find('.submenu').show();
    });
// Hide submenu
    subHideToggle.on("click", function () {
        nav.removeClass('view-submenu');
    });


    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
});
