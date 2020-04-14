(function($) {
    "use strict";

    // Main slider
    var MainSlider = function($scope, $) {

        var MainSlider = $scope.find( '.bb-slideshow' );
        MainSlider.slick({
            slidesToShow: 1,
            autoplay: false,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            dots: false,
            centerMode: true,
            prevArrow: '<div class="slick-arrow-fix slick-left"><i class="bb-slider-icon icofont-long-arrow-left"></i></div>',
            nextArrow: '<div class="slick-arrow-fix slick-right"><i class="bb-slider-icon icofont-long-arrow-right"></i></div>',
            focusOnSelect: false,
            accessibility: false,
        });
    };




    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/resta-slideshow.default', MainSlider);
    });


})(jQuery);