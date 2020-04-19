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

    // Team slider
    var TeamSlider = function($scope, $) {
        var TeamSlider = $scope.find( '.maker-slider' );
        TeamSlider.slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false
        });
    };

    // Testimonial Slider
    var TestimonialSlider = function($scope, $) {
        var TestimonialSlider = $scope.find( '.testimonial-slider' );
        TestimonialSlider.slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            focusOnSelect: false,
            accessibility: false,
            prevArrow: "<button type='button' class='slick-prev'><i class='icofont-arrow-left icofont-2x'></i></button>",
            nextArrow: "<button type='button' class='slick-next '><i class='icofont-arrow-right icofont-2x'></i></button>",
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        centerPadding: '0',
                    }
                }

            ]
        });
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/resta-slideshow.default', MainSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/resta-team.default', TeamSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/resta-testimonial.default', TestimonialSlider);
    });


})(jQuery);