(function ($) {
    "use strict"

    $(document).ready(function () {
        $(".wrapper--faq__button > span").click(function (e) {
            e.preventDefault();

            if ($(this).closest(".wraprer--faq").hasClass("active")) {
                $(this).closest(".wraprer--faq").removeClass("active");
            } else {
                $(".wraprer--faq").removeClass("active");
                $(this).closest(".wraprer--faq").addClass("active");
            }
        });

        // back button head
        $('.back-button-head, .back-to-top-wrap').click(() => {
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        });

        $(window).on("scroll", function () {
            let pos = $(window).scrollTop();
            if(pos > 200) {
                $('.back-button-head, .back-to-top-wrap').css({display: 'block'});
            }else {
                $('.back-button-head, .back-to-top-wrap').css({display: 'none'});
            }
        })

        // event nav
        $('.menu-btn__hamburgers').on("click", function(e){
            e.stopPropagation();
            $('.box-nav').toggle('fast');
        });
        $('.box-option-close').on("click", function(e){
            e.stopPropagation();
            $('.box-nav').toggle('fast');
        });

        $(window).on('resize', function () {
            handleMenu();
        });

        $(window).on('load', function () {
            handleMenu();
        });

        const handleMenu = () => {
            if ($(window).height() <= 500) {
                $('.box-option').css({ height: '30rem' });
            } else if ($(window).height() <= 740) {
                $('.box-option').css({ height: '40rem' });
            } else {
                $('.box-option').css({ height: 'unset' });
            }
        };

        // event q&a
        $('.qa-question__item .qa-question__item-title').on('click', function (e) {
            e.stopPropagation();
            $(this).parent().toggleClass('active');
            let element = $(this).parent().find('.qa-question__content').slideToggle();
        });


    })
})(jQuery)