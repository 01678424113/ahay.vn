jQuery(document).ready(function ($) {
    "use strict";
    if ($(".cp-child-slider").length) {
        $('.cp-child-slider').bxSlider({auto: true, controls: false, });
    }
    if ($(".cp-about-slider").length) {
        $('.cp-about-slider').bxSlider({auto: true, controls: true, pager: false, });
    }
    if ($(".cp-about-testi").length) {
        $('.cp-about-testi').bxSlider({auto: true, controls: false, pager: false, });
    }
    if ($("#cp-about-clientwords").length) {
        $("#cp-about-clientwords").owlCarousel({autoPlay: 6000, items: 2, itemsMobile: [480, 1], itemsDesktop: [1199, 3], itemsDesktopSmall: [979, 3]});
    }
    if ($(".tab-products").length) {
        $(".tab-products").owlCarousel({items: 6, pagination: false, itemsMobile: [480, 1], itemsDesktop: [1199, 3], itemsDesktopSmall: [979, 3]});
    }
    if ($(".plogo-slider").length) {
        $(".plogo-slider").owlCarousel({autoPlay: 3000, items: 7, pagination: false, itemsMobile: [480, 1], itemsDesktop: [1199, 3], itemsDesktopSmall: [979, 3]});
    }
    if ($(".footer-pro-slider").length) {
        $('.footer-pro-slider').bxSlider({auto: true, pager: false, });
    }
    if ($(".gallery").length) {
        $("area[data-rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 3000, autoplay_slideshow: false});
        $(".gallery:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({animation_speed: 'fast', slideshow: 10000, hideflash: true});
    }
    if ($('.video-header').length) {
        $('.video-header').prepend('<div class="video-background"></div>');
        $('.video-background').videobackground({videoSource: [['video/dock.mp4', 'video/mp4'], ['video/dock.webm', 'video/webm'], ['video/dock.ogv', 'video/ogg']], controlPosition: '#main', poster: 'images/mslider1.jpg', loadedCallback: function () {
                $(this).videobackground('mute');
            }});
    }
    if ($('.eventcountdown').length) {
        var austDay = new Date();
        austDay = new Date(2016, 12 - 1, 5, 12, 15)
        $('.eventcountdown').countdown({labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'], until: austDay});
        $('#year').text(austDay.getFullYear());
    }
});
/* $(document).ready(function () {
    "use strict";
    var map;
    var myLatLng = new google.maps.LatLng(37.6369985, -97.3662159)
    var myOptions = {zoom: 16, center: myLatLng, disableDefaultUI: true, zoomControl: true, styles: [{stylers: [{hue: '#f08113'}, {saturation: +100}, ]}], scrollwheel: false, navigationControl: false, mapTypeControl: true, scaleControl: false, draggable: true, mapTypeId: google.maps.MapTypeId.ROADMAP};
    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    var marker = new google.maps.Marker({position: map.getCenter(), map: map});
    marker.getPosition();
    var infowindow = new google.maps.InfoWindow({content: '', position: myLatLng});
    infowindow.open(map);
}); */