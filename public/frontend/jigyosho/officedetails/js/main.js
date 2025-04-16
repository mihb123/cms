//「課題_202307.pptx」No.99対応版 (2023.10.26)

(function ($) {
    "use strict"

    $(document).ready(function () {
        $('.owl-carousel.banner-slide-btn__slide-content').owlCarousel({
          loop: true,
          margin: 10,
          nav: true,
          dots: false,
          nav: false,
          autoWidth: true,
          autoplay: true,
          smartSpeed: 450,
          autoplayTimeout: 3500,
        });

        var owl = $('.owl-carousel.banner-slide-btn__slide-content');
        owl.owlCarousel();
        $('.banner-slide-btn__next').click(function () {
          owl.trigger('next.owl.carousel');
        });
        $('.banner-slide-btn__back').click(function () {
          owl.trigger('prev.owl.carousel', [300]);
        });

        // slider history
        $('.owl-carousel.history-list-mobile').owlCarousel({
          loop: false,
          margin: 10,
          nav: false,
          dots: false,
          items: 1,
        });

        let owlHistory = $('.owl-carousel.history-list-mobile').owlCarousel();

        $('.history-list-mobile__btn-next').click(function () {
          owlHistory.trigger('next.owl.carousel');
        });

        $('.history-list-mobile__btn-back').click(function () {
          owlHistory.trigger('prev.owl.carousel', [300]);
        });

        $('#sidebarTwo').owlCarousel({
          loop: false,
          margin: 0,
          nav: false,
          dots: false,
          items: 1,
          // responsive: {
          //   0: {
          //     margin: 8,
          //   },
          //
          //   410: {
          //     margin: 10,
          //   },
          //
          //   410: {
          //     margin: 10,
          //   },
          // },
        });

        let owlHistorySP = $('.owl-carousel#sidebarTwo').owlCarousel();

        $('.sidebarTow__btn-next').click(function () {
          owlHistorySP.trigger('next.owl.carousel');
        });
        $('.sidebarTow__btn-prev').click(function () {
            owlHistorySP.trigger('prev.owl.carousel');
        });

        $('.ls-menu-button').click(function(){
            $('.box-nav').css('display','block');
        })
        $('.item-list-top').click(function(){
            $(this).removeClass("cursor-active");
        })
        $(".cursor-active").on("touchmove", function(){
            $(this).removeClass("cursor-active");
        })
        //start change 2023/03/23
        $(document).on("click",".show-more", ".ls-table__row--inner .show-more, .feature-box__inner--content .show-more, .ls-expand .show-more", function (e) {
            e.preventDefault();
            var row = $(this).closest(".parent");
            $(this).toggleClass("expanded");
            if($(this).hasClass("expanded")){
                $(this).html($(this).attr("data-less"));
                if(row.find(".detail").length){
                    row.css({height: (row.find(".policy-detail").height() + 60) + "px", 'z-index': 9});
                }else{
                    row.css({height: (row.find(".policy-detail").height() + 35) + "px", 'z-index': 9});
                }
                // Update 030423
                row.addClass("eped");
            }else{
                $(this).html($(this).attr("data-more"));
                row.css({height: "100%"});
                setTimeout(function () {
                    row.css({'z-index': 0});
                }, 500);
                // Update 030423
                row.removeClass("eped");
            
                    $('html, body').animate({
                        scrollTop: row.offset().top - 40
                    }, 500);
          
            }

        })
        //end change 2023/03/23
        rightColumn();
        function rightColumn() {
            var right = $(".main-detail").offset().left + $(".main-detail").width() + 25;
            $(".right-column").css({left: right + "px"});
        }

        //Resize
        $(window).resize(function () {
            rightColumn();
        })

        //Scroll Right Column

        var lastScrollTop = 0;

        function rightColumnScroll(){
            var mainDetail = $(".main-detail");
            var rightColumn = $(".right-column");
            if(rightColumn.length) {
                var st = $(window).scrollTop();
                var mainHeight = mainDetail.height();
                var startScroll = mainDetail.offset().top;
                var endScroll = mainHeight + startScroll;
                var columnHeight = rightColumn.height();

                if((endScroll - columnHeight) > st){
                    rightColumn.css({top: "10px", position: "fixed"});
                }else{
                    rightColumn.css({top: (endScroll - columnHeight) + "px", position: "absolute"});
                }
                lastScrollTop = st;
            }
        }

        $(window).scroll(function(event){
            if($(window).width() > 768){
                rightColumnScroll();
            }
        });

        var extra_height = 13;
        if($(window).width() < 768){
            extra_height = 10.75;
        }

        $(".table-fixed").each(function (e) {
            var table = $(this);
            $(this).find(".row-item").each(function () {
                var dataRow = $(this).attr('data-row');
                var heightRow = $(this).height();

                table.find(".item-row-" + dataRow).css({"height": (heightRow + extra_height) + "px"});
            });
        });
        //start change 2023/03/23
        $(".item-list-top__menu-top .menu-item").on("click", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $(".tab-content").removeClass("active");
            $("#" + id).addClass("active");
            loadMoreRow();
        });
        //end change 2023/03/23
        $('.item-list-top__menu-top').each(function () {
            setActiveItem($(this), false);
        })

        $('.item-list-top__menu-top').find(".menu-item").click(function () {
            var p = $(this).closest(".item-list-top__menu-top");

            p.find('.menu-item').removeClass('active_1 active_2 active_3 active_4 active_5 active_6');
            var link = $(this).find('img').attr('data-src');
            link = link.split('.');
            var link2 = link[link.length - 2] + '_active';
            link[link.length - 2] = link2;
            link = link.join('.');
            var _this = this;
            p.find('.menu-item').each(function () {
                if ($(this).attr('class').includes("active_click")) {
                    $(this).removeClass('active_click');
                    $(this).find('img').attr('src', $(this).find('img').attr('data-src'));
                    $(_this).addClass('active_click');
                }
            });
            $(_this).find('img').attr('src', link);
            setActiveItem(p, $(this));

            var item = p.find('.menu-item').index($(this));
            if (!$('.item-list-top__menu-top').not(p).find('.menu-item:nth-of-type(' + (item + 1) + ')').hasClass('active_click')) {
                $('.item-list-top__menu-top').not(p).find('.menu-item:nth-of-type(' + (item + 1) + ')').trigger("click");
                iconLeft();
            }

        });

        $(".footer-summary .menu-item").on("click", function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        })

        $('.item-list-top__menu-top .menu-item').mouseenter(function () {
            var p = $(this).closest('.item-list-top__menu-top');
            var item = p.find('.menu-item').index(this);
            if ($(window).width() > 767) {
                $(this).find(".thumb").css({width: "110px", height: "110px", transition: "all 0.3s"});
            } else {
                $(this).find(".thumb").css({width: "21.128vw", height: "21.128vw", transition: "all 0.3s"});
            }
            if (p.find('.menu-item:nth-of-type(' + (item + 2) + ')').length) {
                p.find('.menu-item:nth-of-type(' + (item + 2) + ')').addClass('hover');
            }
            if (p.find('.menu-item:nth-of-type(' + (item) + ')').length) {
                p.find('.menu-item:nth-of-type(' + (item) + ')').addClass('hover');
            }

        })
            .mouseleave(function () {
                var p = $(this).closest('.item-list-top__menu-top');
                p.find(".menu-item .thumb").removeAttr("style");
                p.find(".menu-item .thumb img").removeAttr("style");
                p.find(".menu-item").removeClass("hover");
            })

        /* End Js menu-top */

        /* Start Js year-experience */

        $('body .bar-graph').each(function () {
            var text = $(this).attr('data-percent');
            $(this).css('width', text + '%');
            var data = $(this).find('.ratio').html();
            data = text + data;
            text = text.split('%')[0];
            $(this).find('.ratio').html(data);
            //if (text > 70) {
            if (text > 0) {
                $(this).css('position', 'unset');
                $(this).find('.ratio').css({top: "6px", right: "0"});
            }
        });

        if($('body .male-1').length) {
            var text = $('body .male-1').attr('data-percent').split('%');
            var text2 = $('body .male-2').attr('data-percent').split('%');
            text = text[0];
            if (text != null && text != 0) {
                $('body .male-1').css('width', text + '%');
                var data = $('body .male-1').find('.ratio-content').html();
                data = text + '%' + data;
                $('body .male-1').find('.ratio-content').html(data);
                var item2 = 0;
                if (text > 0) {
                    item2 = 100 - text;
                }
                $('body .male-2').css('width', item2 + '%');
                var data = $('body .male-2').find('.ratio-content').html();
                data = item2 + '%' + data;
                $('body .male-2').find('.ratio-content').html(data);
            } else {
                text2 = text2[0];
                $('body .male-2').css('width', text2 + '%');
                var data = $('body .male-2').find('.ratio-content').html();
                data = text2 + '%' + data;
                $('body .male-2').find('.ratio-content').html(data);
                var item2 = 0;
                if (text2 > 0) {
                    item2 = 100 - text2;
                }
                $('body .male-1').css('width', item2 + '%');
                var data = $('body .male-1').find('.ratio-content').html();
                data = item2 + '%' + data;
                $('body .male-1').find('.ratio-content').html(data);
            }
        }

        /* End Js year-experience */

        /* Start Js Icon Left */

        function iconLeft() {
            var scrollTop = $(window).scrollTop();
            var tabContentHeight = $(".table-content-wrap").height();
            var iconLeftHeight = $('.icon-left').height();
            var tabContentStart = $(".table-content-wrap").offset().top;
            var tabContentLeft = $(".table-content-wrap").offset().left;
            var tabContentEnd = tabContentStart + tabContentHeight;
            if (scrollTop > tabContentStart && scrollTop < (tabContentEnd - iconLeftHeight)) {
                $('.icon-left').css({
                    'top': '10px',
                    right: ($(window).width() - tabContentLeft - 2) + 'px',
                    'position': 'fixed'
                });
            } else {
                if (scrollTop < tabContentStart) {
                    $('.icon-left').css({'top': 42 + 'px', right: 'calc(100% - 2px)', 'position': 'absolute'});
                } else {
                    $('.icon-left').css({
                        'top': tabContentHeight - iconLeftHeight + 'px',
                        right: 'calc(100% - 2px)',
                        'position': 'absolute'
                    });
                }
            }
        }

        iconLeft();
        $(window).scroll(function () {
            iconLeft();
        });
        $(window).on("resize", function () {
            iconLeft();
        });

        //$('.required-pay__desc-hover, .help-button__hover').click(function () {
        $('.required-pay__desc-hover, .help-button-med').click(function () {
            $('.required-pay__desc-comment').hide();
            $(this).closest('.help-wrap').find('.required-pay__desc-comment').css('display', 'block');
        });
        $('.comment-footer__close').click(function () {
            $('.required-pay__desc-comment').css('display', 'none');
        });
        $('.locked-mobile').click(function () {
            $('.required-pay').toggleClass('not-hide');
            $('.locked-address').css('transition', 'all 0.1s ease-in-out 0.1s');
            $('.locked-address').toggleClass('active_locked');
            $('.required-pay__desc-comment').css('display', 'block');

        })

        if ($(window).width() <= 767) {
            $('.comment-footer__close').find('#Path_1384').attr('fill', '#fff');
            $('.comment-footer__close').click(function () {
                console.log(1);
                $('.required-pay').toggleClass('not-hide');
                $('.locked-address').css('transition', 'all 0.1s ease-in-out 0.1s');
                $('.locked-address').toggleClass('active_locked');
            })
        }

        // start change 2023/3/22
        $('.w-date__value').each(function(){
            var text = $(this).text().replace("～", "<br>～<br>");
            $(this).html(text);
        });
        $("body .ls-table__row").removeClass('absolute-row');
        $("body .ls-table__row").find(".show-more").remove();
        function loadMoreRow(){
            $("body #tab-summary .ls-table__row, body #tab-office .ls-table__row, body #tab-consultation .ls-table__row:not(.no-more)").each(function () {
                if(Math.round($(this).height()) >= 113 && !$(this).hasClass('absolute-row')){
                    var row_label = $(this).find(".ls-table__label").html();
                    var row_value = $(this).find(".ls-table__value").html();
                    if ($(this).find(".ls-table__value .policy-detail").length > 0){
                        row_value = $(this).find(".ls-table__value .policy-detail").html();
                    }
                    var new_row = '<div class="ls-table__row--inner parent">\n' +
                        '              <div class="ls-table__label">' + row_label + '</div>\n' +
                        '               <div class="ls-table__value"><div class="policy-detail">' + row_value + '</div>' +
                        '                   <a href="#" class="show-more" data-more="続きを表示↓" data-less="閉じる↑">続きを表示↓</a>' +
                        '               </div>\n' +
                        '            </div>';
                    $(this).empty().addClass('absolute-row').html(new_row);
                }
            });

            $("body .map__address-top").each(function () {
                if(Math.round($(this).height()) >= 92 && !$(this).hasClass('absolute-row')){
                    $(this).addClass("absolute-row");
                    var address_html = $(this).find(".map__address-top--text").html();
                    var address_item = '<div class="policy-detail" >' + address_html + '</div><a href="#" class="show-more" data-more="続きを表示↓" data-less="閉じる↑">続きを表示↓</a>';
                    $(this).find(".map__address-top--text").empty().addClass("parent").html(address_item);
                }
            })
            
        }
        $(window).on("load", function () {
            loadMoreRow();
        })

        $(".feature-box__inner--content").each(function () {
            if($(this).find(".policy-detail").height() >= 200){
                $(this).find(".parent").append('<a href="#" class="show-more" data-less="閉じる↑" data-more="続きを表示↓">続きを表示↓</a>');
            }
        })
        $(".tab-content-wrap__right .feature-box").on("click", ".show-more-sp", function (e) {
            e.preventDefault();
            if(!$(this).hasClass("expanded")) {
            $(this).closest(".tab-content-wrap__right .feature-box").css({height: "auto"});
            }else{
            $(this).closest(".tab-content-wrap__right .feature-box ").css({height: "200px"});
            }
        })

        // back button head


        $(".cursor-active").each(function () {
            $(this).addClass("has-cursor");
        })
    });

})(jQuery)

function setActiveItem(p, el) {
    var arr = [];
    p.find('.menu-item').each(function () {
        arr.push($(this));
    })
    if (!el) {
        var item = 0;
    } else {
        item = p.find('.menu-item').index(el);
    }

    $(arr[item - 1]).addClass('active_1');
    $(arr[item + 1]).addClass('active_1');
    $(arr[item - 2]).addClass('active_2');
    $(arr[item + 2]).addClass('active_2');
    $(arr[item - 3]).addClass('active_3');
    $(arr[item + 3]).addClass('active_3');
    $(arr[item - 4]).addClass('active_4');
    $(arr[item + 4]).addClass('active_4');
    $(arr[item - 5]).addClass('active_5');
    $(arr[item + 5]).addClass('active_5');
    $(arr[item - 6]).addClass('active_6');
    $(arr[item + 6]).addClass('active_6');
    $(arr[item - 7]).addClass('active_5');
    $(arr[item + 7]).addClass('active_5');
    $(arr[item - 8]).addClass('active_4');
    $(arr[item + 8]).addClass('active_4');
    $(arr[item - 9]).addClass('active_3');
    $(arr[item + 9]).addClass('active_3');
}

