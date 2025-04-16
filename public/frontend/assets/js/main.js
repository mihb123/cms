(function($){
    $(document).ready(function(){

        $(".top-product-slider:not(.wg)").each(function(){
            $(this).owlCarousel({
                loop: false,
                margin: 30,
                nav: false,
                dots: true,
                items: 4,
                responsive : {
                    0 : {
                        items : 3,
                        margin: 20
                    },
                    768 : {
                        items : 4,
                        margin: 30,
                    }
                }
            });
        });


        $(".top-product-slider.wg").each(function(){
            $(this).owlCarousel({
                loop: false,
                margin: 10,
                nav: false,
                items: 2,
                responsive : {
                    0 : {
                        items : 3,
                    },
                    768 : {
                        items : 2,
                    }
                }
            });
        });

        $('.qa-question__item .qa-question__item-title').on('click', function (e) {
            e.stopPropagation();
            $(this).parent().toggleClass('active');
            let element = $(this).parent().find('.qa-question__content').slideToggle();
        });

        $(".humberger-button").on("click", function(e){
            e.preventDefault();
            if($(window).width() < 768) {
                $("body").addClass("hidden-y");
            }
            $(this).closest(".main-header").find(".humberger-wrap").addClass("active");
        });

        $(".main-menu .close-menu, .humberger-overlay").on("click", function(e){
            e.preventDefault();
            $("body").removeClass("hidden-y");
            $(this).closest(".humberger-wrap").removeClass("active");
        });

        $(".has-submenu > a").on("click", function(e){
            e.preventDefault();
            $(this).closest('.has-submenu').addClass("sub-active");
        })

        $(".close-sub, .sub-overlay").on("click", function(e){
            e.preventDefault();
            $(this).closest('.has-submenu').removeClass("sub-active");
        })

        //Tab
        $(".kc-tab .tab-nav li, .kc-tab .tab-nav .nav-item").on("click", function(e){
            e.preventDefault();
            var tab_id = $(this).attr('data-tab-id');
            var tab_wrap = $(this).closest('.kc-tab');
            tab_wrap.find(".tab-nav li, .tab-nav .nav-item").removeClass("active");
            $(this).addClass("active");
            tab_wrap.find(".kc-tab-content").removeClass("show");
            tab_wrap.find("#" + tab_id).addClass("show");
        })

        $(".scroll-down").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            if($(id).length){
                $('html,body').animate({
                    scrollTop: $(id).offset().top
                }, 1000);
            }
        });

        $(".scroll-to-top, .back-to-top, .footer-scroll-top, .mitori-backtop, .tag-fixed-scrollTop").on("click", function(e){
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 1000);
        })

        $(".box-expand-item .expand-header").on("click", function(e){
            $(this).parent().toggleClass('active');
            $(this).parent().find('.expand-body').slideToggle();
        });

        if($(".cms4-list-news").length){
            $(".cms4-list-news").owlCarousel({
                loop: false,
                margin: 20,
                nav: false,
                dots: false,
                items: 2,
                autoHeight: false,
                responsive : {
                    0 : {
                        items : 1,
                    },
                    768 : {
                        items : 2,
                    }
                }
            });
        }

        $(".mitori-detail-item .m-item-title").on("click", function(){
            $(this).toggleClass("active");
            $(this).closest(".mitori-detail-item").toggleClass("item-active");
            $(this).closest(".mitori-detail-item").find(".acc-body").slideToggle();
        })

        $(".js-filter").on("click", function(){
            $(this).closest(".mitori-filter").addClass("active");
        })

        $(".close-filter").on("click", function(){
            $(this).closest(".mitori-filter").removeClass("active");
        });

        $(".kc-filter .js-filter").on("click", function(){
            $(this).closest(".kc-filter").addClass("active");
        })

        $(".kc-filter .close-filter").on("click", function(){
            $(this).closest(".kc-filter").removeClass("active");
        });

        $(".year-filter .current").on("click", function(){
            $(this).closest(".year-filter").toggleClass("active");
        })

        $(window).scroll(function(){
            stickyHeader();
        })

        stickyHeader();
        function stickyHeader(){
            if($(window).scrollTop() > 100){
                $('body').addClass("is-sticky");
            }else{
                $('body').removeClass("is-sticky");
            }
        }

        $(".point-item.acc .point-header").on("click", function(){
            var p = $(this).parent();
            p.toggleClass("is-active");
            p.find(".point-content").slideToggle();
        })

        $(".tab-menu li a").on("click", function(e){
            if($(window).width() < 768){
                $('html,body').animate({
                    scrollTop: 0
                }, 500);
            }
        })

        $(".list-blue-menu li").on("click", function(){
            var dataTab = $(this).attr('data-tab-id');
            var p = $(this).closest(".blue-tab");
            p.find(".list-blue-menu li").removeClass("is-active");
            $(this).addClass("is-active");
            p.find(".blue-tab-body").removeClass("is-show");
            $("#" + dataTab).addClass("is-show");
        })

        $(".list-yellow-menu li").on("click", function(){
            var dataTab = $(this).attr('data-tab-id');
            var p = $(this).closest(".yellow-tab");
            p.find(".list-yellow-menu li").removeClass("is-active");
            $(this).addClass("is-active");
            p.find(".yellow-tab-body, .yellow-tab-image *").removeClass("is-show");
            $("#" + dataTab).addClass("is-show");
            $('[data-img-id="' + dataTab + '"]').addClass("is-show");
        })

        $(".tag-filter-2").on("click", function(e){
            e.preventDefault();
            $("body").addClass("hidden-y tag-popup");
            $(this).closest(".tag-filter-wrap").addClass("is-active");
        })

        $(".close-filter, .tag-overlay").on("click", function(e){
            e.preventDefault();
            $("body").removeClass("hidden-y tag-popup");
            $(this).closest(".tag-filter-wrap").removeClass("is-active");
        });

        $(".md-filter-wrap .md-filter").on("click", function(e){
            e.preventDefault();
            var p = $(this).closest('.md-filter-wrap');
            p.addClass("is-active");
        })

        $(".close-md, .md-overlay").on("click", function(e){
            e.preventDefault();
            $(this).closest(".md-filter-wrap").removeClass("is-active");
        });

        $(".has-flick:not(.dragged), .has-flick:not(.dragged) *").on("click drag touchstart", function(){
            if($(this).hasClass('has-flick')){
                $(this).addClass("dragged");
            }else{
                $(this).closest('.has-flick').addClass("dragged");
            }
        })

        $(".has-flick-tb:not(.dragged), .has-flick-tb:not(.dragged) *").on("click drag touchstart", function(){
            if($(this).hasClass('has-flick-tb')){
                $(this).addClass("dragged");
            }else{
                $(this).closest('.has-flick-tb').addClass("dragged");
            }
        })

        $(".has-flick-sp:not(.dragged), .has-flick-sp:not(.dragged) *").on("click drag touchstart", function(){
            if($(this).hasClass('has-flick-sp')){
                $(this).addClass("dragged");
            }else{
                $(this).closest('.has-flick-sp').addClass("dragged");
            }
        })

        $(".contactFooter").each(function () {
            $(this).validate({
                rules: {
                    "質問": {required: true,  minlength: 20},
                },
                messages: {
                    "質問": {
                        required: '必須項目です',
                        minlength: '20文字以上で入力してください。',
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        })

        $("body").on("keyup", ".calculate-field", function(){
            var aVal = $('[name="input-a"]').val();
            var bVal = $('[name="input-b"]').val();
            if(aVal && bVal){
                var total = parseFloat(aVal) + parseFloat(bVal);
                $(".result-ab").html(total);
            }else{
                $(".result-ab").html('（A＋B）');
            }
        })

        $(".tag-search:not(.active) .tag-search-form").on("click", function(){
            $(this).closest('.tag-search').addClass('active');
            $("body").addClass("hidden-y");
        })

        $(".tag-search-overlay").on("click", function(){
            $(this).closest('.tag-search').removeClass('active');
            $("body").removeClass("hidden-y");
        })

        $(".media-thumb .thumb").on("click", function(){
            var largeImage = $(this).attr('data-image');
            $(".media-thumb .thumb").removeClass("active");
            $(this).addClass("active");
            $(".large-image .image").attr("src", largeImage);
        })

        $(".btn-cms4-zoom").on("click", function(e){
            e.preventDefault();
            var p = $(this).closest('.zoom-wrap');
            $('body').addClass("hidden-y");
            p.find(".zoom-popup").addClass("show");
            if($('.media-zoom-main-slider').length) {
                var currentIndex = $(".media-thumb .thumb.active").index();
                $('.media-zoom-main-slider').slick('slickGoTo', currentIndex);
            }
        })

        if($('.media-zoom-main-slider').length){
            $('.media-zoom-main-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: false,
                asNavFor: '.media-zoom-footer-slider',
                prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68.524" height="84.49" viewBox="0 0 68.524 84.49"><defs><filter id="greater-than-symbol_2_" x="0" y="0" width="68.524" height="84.49" filterUnits="userSpaceOnUse"><feOffset dx="-21" input="SourceAlpha"/><feGaussianBlur result="blur"/><feFlood flood-opacity="0.102"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#greater-than-symbol_2_)"><path id="greater-than-symbol_2_2" data-name="greater-than-symbol (2)" d="M5.281,84.49a5.339,5.339,0,0,1-3.733-9.014L34.778,42.245,1.547,9.014A5.28,5.28,0,1,1,9.015,1.547L45.978,38.512a5.281,5.281,0,0,1,0,7.467L9.014,82.943A5.281,5.281,0,0,1,5.281,84.49Z" transform="translate(68.52 84.49) rotate(-180)"/></g></svg></button>',
                nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="68.524" height="84.49" viewBox="0 0 68.524 84.49"><defs><filter id="greater-than-symbol_2_" x="0" y="0" width="68.524" height="84.49" filterUnits="userSpaceOnUse"><feOffset dx="21" input="SourceAlpha"/><feGaussianBlur result="blur"/><feFlood flood-opacity="0.102"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#greater-than-symbol_2_)"><path id="greater-than-symbol_2_2" data-name="greater-than-symbol (2)" d="M17.281,92.49a5.339,5.339,0,0,1-3.733-9.014L46.778,50.245,13.547,17.014a5.28,5.28,0,1,1,7.467-7.467L57.978,46.512a5.281,5.281,0,0,1,0,7.467L21.014,90.943a5.281,5.281,0,0,1-3.733,1.547Z" transform="translate(80.00 92.49) rotate(-180)"/></g></svg></button>'
            });
            $('.media-zoom-footer-slider').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                asNavFor: '.media-zoom-main-slider',
                dots: false,
                // centerMode: true,
                // variableWidth: true,
                focusOnSelect: true,
                prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31.383" height="38.76" viewBox="0 0 31.383 38.76"><defs><filter id="path9429" x="0" y="0" width="31.383" height="38.76" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="blur"/><feFlood flood-opacity="0.161"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g id="layer1" transform="translate(22.383 26.76) rotate(-180)"><g transform="matrix(-1, 0, 0, -1, 22.38, 26.76)" filter="url(#path9429)"><path id="path9429-2" data-name="path9429" d="M1.574,0A1.477,1.477,0,0,0,.6,2.616l9.035,7.741L.6,18.094A1.477,1.477,0,1,0,2.52,20.329l10.345-8.851a1.477,1.477,0,0,0,0-2.246L2.52.372A1.476,1.476,0,0,0,1.574,0Z" transform="translate(22.38 26.76) rotate(-180)" fill="#c2c2c2"/></g></g></svg></button>',
                nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31.383" height="38.76" viewBox="0 0 31.383 38.76"><defs><filter id="path9429" x="0" y="0" width="31.383" height="38.76" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="blur"/><feFlood flood-opacity="0.161"/><feComposite operator="in" in2="blur"/><feComposite in="SourceGraphic"/></filter></defs><g id="layer1" transform="translate(9 6)"><g transform="matrix(1, 0, 0, 1, -9, -6)" filter="url(#path9429)"><path id="path9429-2" data-name="path9429" d="M1.574,0A1.477,1.477,0,0,0,.6,2.616l9.035,7.741L.6,18.094A1.477,1.477,0,1,0,2.52,20.329l10.345-8.851a1.477,1.477,0,0,0,0-2.246L2.52.372A1.476,1.476,0,0,0,1.574,0Z" transform="translate(9 6)" fill="#c2c2c2"/></g></g></svg></button>',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 4
                        }
                    }
                ]
            });

            // Remove active class from all thumbnail slides
            $('.media-zoom-footer-slider .slick-slide').removeClass('slick-current');

            // Set active class to first thumbnail slides
            $('.media-zoom-footer-slider .slick-slide').eq(0).addClass('slick-current');

            // On before slide change match active thumbnail to current slide
            $('.media-zoom-main-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.media-zoom-footer-slider .slick-slide').removeClass('slick-current');
                $('.media-zoom-footer-slider .slick-slide').eq(mySlideNumber).addClass('slick-current');
            });
        }


        $(".zoom-popup .close-popup").on("click", function(e){
            e.preventDefault();
            $('body').removeClass("hidden-y");
            $(this).closest(".zoom-popup").removeClass("show");

            var currentIndex = $(".media-zoom-footer-slider .slick-slide.slick-current").index();
            if(currentIndex !== -1){
                $(".media-thumb .thumb").removeClass("active");
                var currentThumb = $(".media-thumb .thumb:nth-of-type(" + (currentIndex + 1) + ")");
                currentThumb.addClass("active");
                $(".media-left .large-image .image").attr("src", currentThumb.attr("data-image"));
            }
        })



        if($(window).width() < 768){
            $(".tag-detail-box:not(.active) .tag-box-body-js").css({display: "none"});

            $(".tag-detail-header-fixed .tag-top-list a").on("click", function (e) {
                e.preventDefault();
                var tabId = $(this).attr("href");
                $("body").removeClass("hidden-y");
                $(this).closest(".tag-filter-wrap").removeClass("is-active");
                if($(tabId).length) {
                    tagAccordion($(tabId).find(".tag-box-toggle"), true);
                }
            })
        }

        $(".tag-box-header-sp .tag-box-toggle").on("click", function (e) {
            e.preventDefault();

            tagAccordion($(this));
        })

        function tagAccordion(el, inFixed = false) {
            var p = el.closest(".tag-detail-box");

            // $(".tag-detail-box").not(p).removeClass("active");
            // $(".tag-detail-box").not(p).find(".tag-box-body-js").hide();
            // if(!p.hasClass('active')) {
            //     $('html, body').animate({
            //         scrollTop: p.offset().top - 90
            //     }, 500);
            // }

            if(inFixed){
                $('html, body').animate({
                    scrollTop: p.offset().top - 90
                }, 0);
            }

            if(!p.hasClass('active')) {
                p.addClass("active");
                p.find('.tag-box-body-js').slideDown(600);
            }else{
                if(!inFixed) {
                    p.find('.tag-box-body-js').slideUp({
                        duration: 600,
                        complete: function () {
                            p.removeClass("active");
                        }
                    });
                }
            }
        }

        $(document).on("click", ".mitori-link", function (e) {
            e.preventDefault();
            var id = $(this).attr("href");
            $(this).closest(".md-filter-wrap").removeClass("is-active");
            if($(id).length) {
                var top = 0;
                if($(window).width() < 768){
                    top = 60;
                }
                $('html, body').animate({
                    scrollTop: $(id).offset().top - top
                }, 0);
                $(id).addClass("item-active");
                $(id).find(".acc-body").slideDown();
            }

        })

        $('.step-box input[type="radio"]').on("change", function(){
            var p = $(this).closest(".step-box");
            var st2o = $(this).closest(".step2-options");
            var nextStep = p.find(".next-step");
            p.addClass("has-choose");
            p.find(".step2-options").removeClass("option-active");
            if(st2o.length){
                st2o.addClass("option-active");
            }
            // if(nextStep){
            //     nextStep.trigger('click');
            // }

        })

        $('.step-1 input[type="radio"]').on("change", function(){
            if($(this).val() == 1){
                $('.about-care').removeClass('disabled');
            }else{
                $('.about-care').addClass('disabled');
            }
        });

        $(".next-step").on("click", function(e){
            e.preventDefault();
            var stepId = $(this).attr("href");
            $('html, body').animate({
                scrollTop: $(stepId).offset().top - 10
            }, 800);
        })

        // $(".cal-help-button").on("click", function(e){
        //     e.preventDefault();
        //     var p = $(this).closest(".help-group");
        //     p.addClass("is-show");
        // })

        $(document).on("click", ".close-help-popup", function(e){
            e.preventDefault();
            var p = $(this).closest(".help-group");
            p.removeClass("is-show");
        })

        if($(window).width() > 1025 && typeof Swiper !== 'undefined'){
            var initialSlide = $(".menu-tab-slider").find(".swiper-slide.active").index();
            initialSlide = initialSlide < 5 ? 0 : initialSlide;
            var slideOption = {
                slidesPerView: "auto",
                spaceBetween: 0,
                initialSlide: initialSlide
            };
            var menuSwiper = new Swiper(".menu-tab-slider", slideOption);

        }

        $("body .step4-acc-item .heading").on("click", function(e){
            e.preventDefault();
            var p = $(this).closest(".step4-acc-item");
            p.toggleClass("active");
            p.find(".acc-body").slideToggle();
        })

        $("body .step4-checkbox-item").on("click", function(e){
            e.preventDefault();
            if($(e.target).closest(".help-group").length == 0 && $(e.target).closest(".select-group").length == 0){
                $(this).toggleClass("checked");
                if($(this).hasClass("checked")){
                    $(this).find('input[type="checkbox"]').prop("checked", true);
                }else{
                    $(this).find('input[type="checkbox"]').prop("checked", false);
                    $(this).find(".select-dropdown").removeClass("show");
                    $(this).find("select").val('');
                    $(this).find(".subtotal .value").text('');
                }
            }
        })

        $("body").on("click", ".active-text", function(e){
            e.preventDefault();
            var p = $(this).closest(".select-group").find(".select-dropdown").addClass("show");
        })

        $("body .select-dropdown li").on("click", function(e){
            e.preventDefault();
            $(this).closest(".select-dropdown").removeClass("show");
            $(this).closest(".select-dropdown").find("li").removeClass("selected");
            $(this).addClass("selected")
            var val = $(this).attr("data-value");
            var p = $(this).closest(".select-group");
            p.find("select").val(val).change();
            p.find(".select-text").html(val);
        })

        if($(".step-box").length){
            $("html, body").animate({ scrollTop: 0 }, 300);
        }

        // Help icon
        $(document).on("click", ".cal-help-button", function(e){
            e.preventDefault();
            var p = $(this).closest(".help-group");
            p.addClass("is-show");
        })

        $(document).on("click", ".close-help-popup", function(e){
            e.preventDefault();
            var p = $(this).closest(".help-group");
            p.removeClass("is-show");
        })

        $(document).on("click", ".step4-acc-item .heading", function(e){
            e.preventDefault();
            var p = $(this).closest(".step4-acc-item");
            p.toggleClass("active");
            p.find(".acc-body").slideToggle();
        })

        $(document).on("click", ".active-text", function(e){
            e.preventDefault();
            $(this).closest(".select-group").find(".select-dropdown").addClass("show");
        })

        if($(".cms1 .tab-menu--list.d-pc-none").length){
            var myScrollPos = $('.cms1 .tab-menu-scroll .active').offset().left + $('.cms1 .tab-menu-scroll .active').outerWidth(true)/2 + $('.cms1 .tab-menu-scroll').scrollLeft() - $('.cms1 .tab-menu-scroll').width()/2;
            $('.cms1 .tab-menu-scroll').scrollLeft(myScrollPos);
        }

        $(".filter-item-wrap.has-dropdown .mitori-filter-item").on("click", function(e){
            e.preventDefault();
            var p = $(this).closest(".has-dropdown");
            p.toggleClass("active");
            p.find(".filter-item-dropdown").slideToggle();
        })

        $(".plus-tag-js > button").on("click", function(e){
            e.preventDefault();
            $(this).closest(".plus-tag-js").addClass("active")
        })

        $(".plus-tag-js .close-tag-popup").on("click", function(e){
            e.preventDefault();
            $(this).closest(".plus-tag-js").removeClass("active");
        })

        $(".plus-tag-js .kc-btn-confirm").on("click", function(e){
            e.preventDefault();
            $(this).closest(".plus-tag-js").removeClass("active");
            var product_id = $(this).data('product-id');
            var ids = [];
            $(".list-tags-filter-js").empty();
            $('.plus-dropdown .checkbox-item input[type=checkbox]').each(function(){
                if($(this).is(":checked")){
                    $(".list-tags-filter-js").append(`<span class="item" data-id="${$(this).data('id')}" data-product-id="${product_id}">${$(this).val()}</span>`);
                    ids.push($(this).data('id'));
                }
            })

            var form = new FormData();
            form.append('ids', ids);
            form.append('id_product', product_id);

            $.ajax({
                type: "POST",
                url: '/product/showCompanyByService',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form,
                processData: false,
                contentType: false,
                beforeSend: function(){

                },
                success:function(response){
                    $('#cms4-detail-tab-2 .more-button').remove();
                    $('#cms4-detail-tab-2 .cms4-list-stores').html(response.result);
                }
            });

        })

        $(document).on("click", ".tab-2-header .list .item", function (e) {
            e.preventDefault();
            $(this).toggleClass("checked");
            var ids = [];
            var id_checked = [];
            $('.tab-2-header .list .item').each(function() {
                if($(this).hasClass("checked")) {
                    id_checked.push($(this).data('id'));
                } else {
                    ids.push($(this).data('id'));
                }
            })

            var form = new FormData();
            form.append('ids', ids);
            form.append('id_checked', id_checked);
            form.append('id_product', $(this).data('product-id'));

            $.ajax({
                type: "POST",
                url: '/product/showCompanyByService',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form,
                processData: false,
                contentType: false,
                beforeSend: function(){

                },
                success:function(response){
                    $('#cms4-detail-tab-2 .more-button').remove();
                    $('#cms4-detail-tab-2 .cms4-list-stores').html(response.result);
                }
            });
        })

        var swiper = new Swiper(".top-product-swiper", {
            slidesPerView: 3,
            spaceBetween: 15,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
            },
        });

        var swiper = new Swiper(".pickup-slider", {
            slidesPerView: 4,
            spaceBetween: 22,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            on: {
                init: function () {
                    var piMax = 0;
                    $(".pickup-slider .item").each(function () {
                        var pH = $(this).height()
                        if( pH > piMax){
                            piMax = pH;
                        }
                    })
                    $(".pickup-slider .pickup-item").css({"min-height": piMax + "px"});
                },
            }
        });

        // $(".pickup-slider").owlCarousel({
        //     loop: false,
        //     margin: 22,
        //     nav: false,
        //     dots: false,
        //     items: 5,
        //     autoWidth: true,
        //     onInitialized: function() {
        //         var piMax = 0;
        //         $(".pickup-slider .owl-item").each(function () {
        //             var pH = $(this).height()
        //             if( pH > piMax){
        //                 piMax = pH;
        //             }
        //         })
        //         $(".pickup-slider .pickup-item").css({"min-height": piMax + "px"});
        //     }
        // });

    })

    /**「看取りに 大切な3つのこと」**/
    //- オンマウス・マウスアウト時の変化を追加
    $(document).on("mouseenter", ".list-3it  .item-3it", function (e) {

        $(this).css({"cursor": "pointer"});

        if ( (item = $(this).find(".title-right .title")).length > 0 ){
             item.css({"transition": "all 1s"});
            item.css({"border-bottom": "1px solid #9b9898"});
        }

        if ( (item = $(this).find(".icon-left .point-text")).length > 0 ){
            item.css({"transition": "all 0.3s"});
            item.css({"font-size": "14px"});
            item.css({"color": "#f0a9b9"});
            item.css({"font-weight": "bold"});
        }
    });
    $(document).on("mouseleave", ".list-3it  .item-3it", function (e) {

        if ( (item = $(this).find(".title-right .title")).length > 0 ){
             item.css({"border-bottom": "none"});
        }

        if ( (item = $(this).find(".icon-left .point-text")).length > 0 ){
            item.css({"font-size": "10px"});
            item.css({"color": "#e99cad"});
            item.css({"font-weight": "nomal"});
        }
    });
    //- クリック時の画面遷移を追加
    $(document).on("click", ".list-3it  .item-3it", function () {

         if ( (item = $(this).find(".icon-left .point-text")).length > 0 ){

             switch(item.text()){
                 case "Point 1":
                    location.href = '/大切な3つの看取りポイント_N/index.html#feature';
                    break;

                case "Point 2":
                   location.href = '/大切な3つの看取りポイント_N/index.html#books';
                    break;

               case "Point 3":
                    location.href = '/大切な3つの看取りポイント_N/index.html#hand';
                    break;
            }
        }
     });

    /*「家族にできる看取りの要点5つの事」 */
    // - オンマウス・マウスアウト時の変化を追加
    $(document).on("mouseenter", ".list-points .point-item", function (e) {

        $(this).css({"cursor": "pointer"});

        if ( (item = $(this).find(".thumb img")).length > 0 ){
             item.css({"cursor": "pointer"});
             item.css({"transition": "all 0.5s"});
             item.css({"scale": "1.3"});
        }

        if ( (item = $(this).find(".caption .title")).length > 0 ){
            item.css({"transition": "all 0.3s"});
            item.css({"font-size": "19px"});
        }
    });
    $(document).on("mouseleave", ".list-points .point-item", function (e) {
         if ( (item = $(this).find(".thumb img")).length > 0 ){
             item.css({"scale": "1"});
        }

        if ( (item = $(this).find(".caption .title")).length > 0 ){
            item.css({"font-size": "17px"});
        }
    });
     //- クリック時の画面遷移を追加
    $(document).on("click", ".list-points .point-item", function () {

          if ((item = $(this).find(".thumb img")).length > 0 ){

              var img = (item.attr('src')).split("/").pop();
             switch(img){
                 case "f-point-1.png":
                    location.href = '/家族にできる5つの事_N/index.html/#collect';
                    break;
                case "f-point-2.png":
                   location.href = '/家族にできる5つの事_N/index.html/#hear';
                    break;
               case "f-point-3.png":
                    location.href = '/家族にできる5つの事_N/index.html#decide';
                    break;
               case "f-point-4.png":
                    location.href = '/家族にできる5つの事_N/index.html#reserve';
                    break;
               case "f-point-5.png":
                    location.href = '/家族にできる5つの事_N/index.html#do';
                    break;
               default :
                    location.href = '/家族にできる5つの事_N/index.html';
                    break;
            }
        }
     });
     //- SP版 アコーディオンメニュー内 「もっと詳しく読む」クリック時の画面遷移を追加・変更
     $(document).on("click", ".link-with-icon", function () {

         var item = $(this).parent().parent().parent().find(".point-header object");
         if (item.length > 0) {
            //aタグで設定されている設定は取り除く
             //$(this).removeAttr('href');

            var img = (item.attr('data')).split("/").pop();
            switch(img){
                case "f-point-1.svg":
                   location.href = '/家族にできる5つの事_N/index.html/#collect';
                   break;
               case "f-point-2.svg":
                  location.href = '/家族にできる5つの事_N/index.html/#hear';
                   break;
              case "f-point-3.svg":
                   location.href = '/家族にできる5つの事_N/index.html#decide';
                   break;
              case "f-point-4.svg":
                   location.href = '/家族にできる5つの事_N/index.html#reserve';
                   break;
              case "f-point-5.svg":
                   location.href = '/家族にできる5つの事_N/index.html#do';
                   break;
              default :
                  location.href = '/家族にできる5つの事_N/index.html';
                  break;
                }
            }
     });
})(jQuery)

// window.onload = function() {
//     /*「身体や心を楽にしてくれるもの」- 非表示化 */
//     //  CMS4（製品）
//     $(document).ready(function(){
//         item = $(this).find(".top-product div");
//         item.css({"display": "none"});
//     });
// }

