(function ($) {
    "use strict";

    $(document).ready(function () {

        /*----------------------
        Search Popup
        -----------------------*/
        var bodyOvrelay = $('#body-overlay');
        var searchPopup = $('#search-popup');

        $(document).on('click', '#body-overlay', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click', '.search-popup-btn', function (e) {
            e.preventDefault();
            searchPopup.addClass('active');
            bodyOvrelay.addClass('active');
        });

        // /*-------------------------
        //     rPopup popup activation
        // -------------------------*/
        // $('.video-play-btn').rPopup({
        //     'video': { embed: true, autoplay: true, }
        // });
                 /*-------------------------
            Video player activation
        -------------------------*/
        $('.video-play-transport').rVideoPlayer({
            autoplay: false
            });

        $('.single-service-item').tilt({
            maxTilt: 20,
            perspective:700, 
            glare: true,
            maxGlare: .3
        });
        
        $('.price-box').tilt({
            maxTilt: 15,
            perspective: 1400,
            easing: "cubic-bezier(.03,.98,.52,.99)",
            speed: 1200,
            glare: true,
            maxGlare: 0.2,
            scale: 1.04
        });
         /*---------------------------
             Mobile Cross Menu
       -----------------------------*/
       $(document).on('click', '.cross-menu', function (e) {
        e.preventDefault();
        $(this).toggleClass("change");
    })
        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })

        /**-----------------------------
         * Togle Navbar
         * ---------------------------*/
        var navToggleButton = $('.navbar-toggler');
        var slideDesktopNav = $('.side-desktop-nav');
        // navToggleButton.on('click', function () {

        // });

        $(document).on('click', function (e) {
            var target = e.target;
            if ($(target).hasClass('navbar-toggler')) {
                navToggleButton.toggleClass('opened-navbar');
                slideDesktopNav.toggleClass('active-destop-side-menu');
            } else if ($(target).hasClass('navbar-nav') || $(target).parent().hasClass('navbar-nav') || $(target).parent().parent().hasClass('navbar-nav')) {
                return;
            } else {
                if (navToggleButton.hasClass('opened-navbar')) {
                    navToggleButton.removeClass('opened-navbar');
                }
                if (slideDesktopNav.hasClass('active-destop-side-menu')) {
                    slideDesktopNav.removeClass('active-destop-side-menu');
                }
            }
        })


         /***************************
    transport area slider start
    ***************************/
    if ($('.transport-slider').length > 0) {
        var headerCarousel = $('.transport-slider-area-wrapper');
        $('.transport-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            infinite: true,
            dots: true,
          //  autoplay: true,
          //  speed: 1500,
          //  prevArrow: '<button type="button" class="slick-prev"><i class=""></i></button>',
         //   nextArrow: '<button type="button" class="slick-next"><i class="flaticon-move-to-next"></i></button>',
            appendArrows: $('.transport-slider-controls'),
            appendDots: $('.transport-slider-controls')
        });
    }

    if ($('.transport-slider-nav').length > 0) {
        $(".transport-slider-nav").slick({
            slidesToShow: 3,
            asNavFor: '.transport-slider',
            focusOnSelect: true,
            infinite: true
           });
    }


    $(document).on('click', '.transport-slider-controls .slick-dots li', function () {
        var el = $(this);
        var prevSiblings = el.prevAll();
        var index = prevSiblings.length;
        $('.transport-slider-nav .transport-slider-nav-active').removeClass('slick-current');
        $('.transport-slider-nav .transport-slider-nav-active[data-slick-index="' + index + '"]').addClass('slick-current');
    });

    $(document).on('click', '.transport-slider-controls .slick-prev ,.transport-slider-controls .slick-next', function () {
        var currentSlide = $('.transport-slider').slick('slickCurrentSlide');
        addtransportSliderIndicatorActive(currentSlide);
    });

    function addtransportSliderIndicatorActive(currentSlide) {
        $('.transport-slider-nav .transport-slider-nav-active').removeClass('slick-current');
        $('.transport-slider-nav .transport-slider-nav-active[data-slick-index="' + currentSlide + '"]').addClass('slick-current');
    }

    // Indicator setting
    $('.transport-slider-area-wrapper').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var firstNumber = check_number(++nextSlide);
        $('.transport-slider-controller .slider-count .current').text(firstNumber);

        var currentsliderIndex = nextSlide;
        sliderProgressStep(
            slick.slideCount,
            currentsliderIndex,
            $(".transport-slider-progress-is")
        );
    });

    const totalSlide = $('.transport-slider-item').length;
    const firstItemHeight = 100 / totalSlide;
    $(".transport-slider-progress-is").css({ height: firstItemHeight + '%' })

    function sliderProgressStep(totalSlider, currentsliderIndex, selector) {
        var progressHeight = 100 / totalSlider;
        var progressStep = progressHeight * currentsliderIndex;
        selector.css({ height: progressStep + "%" });
    }

         /***************************
    transport header slider 2
    ***************************/
      $('.header-slider').slick({
        dots: false,
        arrows: true,
        asNavFor: '.header-sm-slider',
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        autoplay: true
        // prevArrow: '<button type="button" class="slick-prev"><i class=""></i></button>',
        // nextArrow: '<button type="button" class="slick-next"><i class="flaticon-move-to-next"></i></button>'
    });

    $('.header-slider').slickAnimation();

    $('.header-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var totalSlide = slick.slideCount;
        var currentSlideindex = ++slick.currentSlide;
        var progress = 100 / totalSlide;
        var progressWidth = progress * currentSlideindex;
        ProgressbarStart(progressWidth)
        $('.controler-wrapper .total-controler').text(check_number(totalSlide));
        $('.controler-wrapper .active-controler').text(check_number(currentSlideindex));

    });

    function ProgressbarStart(headerprogress) {
        $('.progressbar .home-slider-progress-active').css({ 'width': headerprogress + '%' });
    }

    $('.header-sm-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.header-slider',
        dots: false,
        arrows: true,
        focusOnSelect: true,
        // centerMode: true,
        centerPadding: 0,
        // fade: true
         autoplay: true,
    });
    
          /***************************
    transport header slider 3
    ***************************/
   $('.header-slider3').slick({
    dots: false,
    arrows: true,
    asNavFor: '.header-sm-slider',
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: false,
    autoplay: true,
    prevArrow: '<button type="button" class="slick-prev"><i class=""></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="flaticon-move-to-next"></i></button>'
});

$('.header-slider3').slickAnimation();

$('.header-slider3').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var totalSlide = slick.slideCount;
    var currentSlideindex = ++slick.currentSlide;
    var progress = 100 / totalSlide;
    var progressWidth = progress * currentSlideindex;
    ProgressbarStart(progressWidth)
    $('.controler-wrapper .total-controler').text(check_number(totalSlide));
    $('.controler-wrapper .active-controler').text(check_number(currentSlideindex));

});

function ProgressbarStart(headerprogress) {
    $('.progressbar .home-slider-progress-active').css({ 'width': headerprogress + '%' });
}

$('.header-sm-slider3').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    asNavFor: '.header-slider3',
    dots: false,
    arrows: true,
    focusOnSelect: true,
    // centerMode: true,
    centerPadding: 0,
    // fade: true
    // autoplay: true,
});
    function check_number(num) {
        var IsInteger = /^[0-9]+$/.test(num);
        return IsInteger ? '' + num : null;
    }

 /**-----------------------------
         *  testimonial Slider
         * ---------------------------*/
        $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            autoplay: true,
            autoplaySpeed: 1000,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><i class=""></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-move-to-next"></i></button>',
            responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

 /**-----------------------------
         *  testimonial Slider
         * ---------------------------*/
        $('.testimonial-slider-two').slick({
            dots: true,
            infinite: true,
            speed: 1500,
            autoplay: true,
            autoplaySpeed: 1000,
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-chevron-pointing-to-the-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="flaticon-move-to-next"></i></button>',
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });


        /**------------------------
         *  Team Carousel
         * ---------------------**/
       
        var $teamCarousel = $('.team-carousel');
        $teamCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            autoPlayTimeout: 1000,
            margin: 30,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 2
                },
                768: {
                    items: 2
                },
                960: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 4
                }
            }
        });

         /**-----------------------
        *  counter activation
        * ---------------------**/
       $('.counter').counterUp({
        delay: 10,
        time: 2000
        });


        /*------------------
        back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

        /**-----------------------------
                Scroll to next Section
        ---------------------------*/
        $('.scroll-bottom a').click(function (e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $(this.hash).offset().top
            }, 1500);
        });
 
       
         /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

       
/**------------------------------
         * Company carousel
         * ---------------------------**/

        var $companyCarousel = $('.company-carousel');
        $companyCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            autoPlayTimeout: 1000,
            margin: 30,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                414: {
                    items: 2
                },
                768: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 6
                },
                1920: {
                    items: 8
                }
            }
        });

        /**------------------------
         *  transport Carousel
         * ---------------------**/
      
        /*--------------------
        wow js init
        ---------------------*/
        new WOW().init();

    });


     //define variable for store last scrolltop

     $(window).on('scroll', function() {
 
         //back to top show/hide
         var ScrollTop = $('.back-to-top');
         if ($(window).scrollTop() > 1000) {
             ScrollTop.fadeIn(1000);
         } else {
             ScrollTop.fadeOut(1000);
         }
 
 
     });
     
        
   
    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(1000);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });
    });
   
   
        //  $('.accordion li').removeClass('active');
        // $(this).find('.plus-minus-toggle').toggleClass('collapsed');
        // $(this).parent().toggleClass('active');
// Toggle Collapse
var acordionBtn = $('.accordion .question');

if (acordionBtn.length) {
    acordionBtn.on('click', function () {
        if (!$(this).parent().hasClass('active')) {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            $(this).find('.plus-minus-toggle').toggleClass('collapsed');
        }else {
            $(this).parent().removeClass('active');
            $(this).find('.plus-minus-toggle').toggleClass('collapsed');
        }
    });
}


      
})(jQuery);


