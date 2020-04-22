(function ($, window, document,) {
    "use strict";
    var $win = $(window);
    var $doc = $(document);
    var $body = $('body');


    /*
    *
    * ==========================================
    *  Popup-youtube
    * ==========================================
    *
    */

    $('.play-btn').magnificPopup({
        type: 'iframe',
        closeOnBgClick: false,
        closeBtnInside: true,
        iframe: {
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: function (url) {
                        var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                        if (!m || !m[1]) return null;
                        return m[1];
                    },
                    src: '//www.youtube.com/embed/%id%?autoplay=1'
                },
                vimeo: {
                    index: 'vimeo.com/',
                    id: function (url) {
                        var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                        if (!m || !m[5]) return null;
                        return m[5];
                    },
                    src: '//player.vimeo.com/video/%id%?autoplay=1'
                }
            }
        }
    });


    /*
    *
    * ==========================================
    *   sticky nava bar
    * ==========================================
    *
    */

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 50) {
            $('#header').addClass('navbar-fixed');
        } else {
            $('#header').removeClass('navbar-fixed');
        }
    });


    /*
    *
    * ==========================================
    *   Mobile Menu
    * ==========================================
    *
    */
    $body.on('click', '.nav-mobile', function (e) {
        e.preventDefault();
        $('body').toggleClass('body-overflow');
        $('.menu-all-pages-container').toggleClass('has-open-menu');
    });

    /*
    *
    * ==========================================
    *   Youtube Video
    * ==========================================
    *
    */

    $('.youtube-play-btn,.youtube-close').on( 'click', function () {
        $(this).parents('.elementor-element').toggleClass('youtube-index');
        $('.youtube-popup').toggleClass('has-active');
        //$("#video-youtube")[0].src += "&autoplay=1";
    });


    /*
    *
    * ==========================================
    *  Product filter
    * ==========================================
    *
    */

    // init Isotope
    var $grid = $('.category-filter ul.products').isotope({
        itemSelector: '.product',
    });
    // filter items on button click
    $('#filters').on('click', 'button', function () {
        var $this = $(this), thisActive = $this.hasClass('is-checked'), active;
        if (thisActive) {
            $this.removeClass('is-checked');
        } else {
            active = $('.button.is-checked');
            if (active.length === 1) {
                active.removeClass('is-checked');
            }
            $this.addClass('is-checked');
            $grid.isotope({filter: $this.attr('data-filter')});
        }

    });

    /*
    *
    * ==========================================
    *  gallery-grid Messonary
    * ==========================================
    *
    */

    // init Isotope
    $('.gallery-grid').isotope({
        itemSelector: '.gallery-item',
        percentPosition: true,
        masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: 1
        }
    });

    function magnificPopupView(target) {
        target.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function (openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    }

    var special = $('.special-feature-img').find('a'),
        about = $('.about-us-img').find('a'),
        gallery = $('.gallery-grid').find('a'),
        gallery_list = $('.gallery-list').find('a'),
        resta_gallery_grid = $('.resta-gallery-grid').find('a');

    if (special.length > 0 || about.length > 0 || gallery.length > 0 || gallery_list.length > 0) {
        magnificPopupView(special);
        magnificPopupView(about);
        magnificPopupView(gallery);
        magnificPopupView(gallery_list);
        magnificPopupView(resta_gallery_grid);
    }


    /*
    *
    * ==========================================
    *  Testimonial-slider
    * ==========================================
    *
    */

    var testimonial = $('.testimonial-slider');
    if (testimonial.length > 0) {
        testimonial.slick({
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
    }


    /*
    *
    * ==========================================
    *  maker-slider
    * ==========================================
    *
    */

    var maker = $('.maker-slider');
    if (maker.length > 0) {
        maker.slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
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
    }
    /*
        *
        * ==========================================
        *  gallery-slider
        * ==========================================
        *
        */

    var gallery_slider= $('.gallery-slider');
    if (gallery_slider.length > 0) {
        gallery_slider.slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow:5,
            slidesToScroll: 1,
            arrows: false,
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
    }


    /*
    *
    * ==========================================
    *  back to top
    * ==========================================
    *
    */

    $win.scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });


    /*
    *
    * ==========================================
    *  Smooth scroll
    * ==========================================
    *
    */

    $('a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 600, function () {
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex', '-1');
                            $target.focus();
                        }
                        ;
                    });
                }
            }
        });

})(jQuery, window, document);