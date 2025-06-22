(function($) {
    "use strict";

    /*----------------------------
    START - Method for loading time controls
    ------------------------------ */
    function leaderjs() {
        var windowH = $(window).height(),
            welcomeTH = $('.welcome-text').height(),
            middle = ((windowH - welcomeTH) / 2);

        $('.home-area, .parallax, .bgslider .slick-slide img').css('height', windowH);

        // Welcome text style while loadin
        $('.welcome-text').css({
            paddingTop: middle,
            paddingBottom: middle,
        });

        $(document).on('click', '.scrolldownb', function() {
            $('html, body').animate({ scrollTop: windowH }, '50');
        });
        // Header search-box toggle
        $(document).on('click', '.searchbox .fa', function() {
            $('.searchboxss').toggleClass('searchopen');
        });
    }
    leaderjs();
    // Window Resize Function
    $(window).on('resize', function() {
        leaderjs();
    });

    // Header background Parallax active
    if ($.fn.scrolly) {
        $('.parallax').scrolly({ bgParallax: true });
    }

    /*----------------------------
    START - Slider activation
    ------------------------------ */
    // About section slider
    $('.about-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: false,
        autoplay: true,
    });
    // Header background slider
    // header background video slider
    // header content slider
    $('.bgslider, .videoslider, .contentslider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev fa fa-long-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next fa fa-long-arrow-right"></button>',
    });
    // Team section slider
    $('.team-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: false,
        cssEase: 'linear',
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<button type="button" class="slick-prev fa fa-long-arrow-left"></button>',
        nextArrow: '<button type="button" class="slick-next fa fa-long-arrow-right"></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 680,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]

    });

    /*----------------------------
    START - Counter Up JS activation
    ------------------------------ */
    $('.counter').counterUp({
        delay: 10,
        time: 1000

    });

    /*----------------------------
    START - One page MENU scrolling JS activation
    ------------------------------ */
    $('.menu').onePageNav({
        currentClass: 'active',
        changeHash: false,
        scrollSpeed: 750,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
        begin: function() {
            //I get fired when the animation is starting
        },
        end: function() {
            //I get fired when the animation is ending
        },
        scrollChange: function($currentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
    });

    $(".menu-section").sticky({ topSpacing: 0 });

    // navbar collapse activation
    $(".navbar-collapse ul li a").on('click', function() {
        $(".navbar-collapse").removeClass("in");
    });

    /*----------------------------
    START - Page loader activation with animation
    ------------------------------ */
    $('#preloader').fadeOut('slow', function() {
        $(this).remove();
    });

    /*----------------------------
    START - jQuery Tubular activation
    ------------------------------ */
    if ($.fn.YTPlayer) {
        $(".tubular").YTPlayer();
    }


    /*----------------------------
    START - Scroll to Top activation
    ------------------------------ */
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });

    $(document).on('click', '#return-to-top', function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });

    /* =================================
    ===  CONTACT FORM          ====
    =================================== */
    $("#contact-form").on('submit', function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var dataString = 'name=' + name + '&email=' + email + '&subject=' + subject + '&message=' + message;

        function isValidEmail(emailAddress) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        };

        if (isValidEmail(email) && (message.length > 1) && (name.length > 1)) {
            $.ajax({
                type: "POST",
                url: "../php/sendmail.php",
                data: dataString,
                success: function() {
                    $('.success').fadeIn(1000);
                    $('.error').fadeOut(500);
                }
            });
        } else {
            $('.error').fadeIn(1000);
            $('.success').fadeOut(500);
        }

        return false;
    });

})(jQuery);
// END jQuery
