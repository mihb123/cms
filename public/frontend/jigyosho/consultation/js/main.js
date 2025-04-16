// step-1
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function checkCookie() {
    let user = getCookie("username");
    if (user != "") {
      alert("Welcome again " + user);
    } else {
      user = prompt("Please enter your name:", "");
      if (user != "" && user != null) {
        setCookie("username", user, 365);
      }
    }
  }

$(document).ready(function(){
    
    $('.step-by-step .check-ok').click(function(){
        if(! $(this).parents('.step-by-step').hasClass('active')){
            $(this).parents('.step-by-step').addClass('active');
        }
    });
    //
    // $('#item-1').click(function(){
    //     if($(this).prop("checked") == true ){
    //         $('.input1').removeAttr('disabled');
    //         $('.input1').focus();
    //     } else{
    //         $('.input1').attr('disabled','true');
    //     }
    // });
    // $('#item-3').click(function(){
    //     if($(this).prop("checked") == true){
    //         $('.input1').removeAttr('disabled');
    //         $('.input1').focus();
    //     } else{
    //         $('.input1').attr('disabled','true');
    //     }
    // });
    // $('#item-2').click(function(){
    //     if($(this).prop("checked") == true){
    //         $('.input2').removeAttr('disabled');
    //         $('.input2').focus();
    //     } else{
    //         $('.input2').attr('disabled','true');
    //     }
    // });
})
$(document).ready(function(){
    $('.step-by-step .check.not').click(function(){
        $(this).parents('.step-by-step').removeClass('active');

    })
})

$(document).ready(function(){
    $('.next-one').click(function(){
        $(this).parents('.step-by-step').removeClass('active');
        $(this).parents('.step-main').addClass('page-two active');
        $("html, body").animate({ scrollTop: 0 });
    })
})
// step-2

$(document).ready(function(){
    var $input = $(this);

    let imgUrl, textName;
    $('.btn-list-option').click(function(e){
        e.preventDefault();
        var self = $(this),
        wrap = self.closest('.btn-list-option');
        imgUrl = wrap.find('img').attr('src'),
        textName =  wrap.find('span:not(.checkmark)').text();
    
        $('.form-page__two input[type="radio"]').prop('checked',false);

        $(".list-option").removeClass("active");
        $(this).parent().addClass("active");
        wrap.find('input[type="radio"]').prop('checked',true);

        $(this).closest('.step-by-step').addClass('active');
    });

    $('.next-two').click(function(){
        $(this).parents('.step-by-step').removeClass('active');
        $(this).parents('.step-main').removeClass('page-two');
        $(this).parents('#wrapper').addClass('main-page-3');
        $(this).parents('.step-main').addClass('page-three active');
        $("html, body").animate({ scrollTop: 0 });
        if( $('.form-page__three').length ){
             $('.form-page__three').find('.background img').attr('src', imgUrl);
             $('.form-page__three').find('.background span').text( textName );
        
         }
    })
     
 })
// hamburger
$(document).ready(function(){
    $('.js-hamburger').click(function(event){
        event.preventDefault()
         if( $(this).parents('.hamburger').hasClass('active')){
             $(this).parents('.hamburger').removeClass('active');
         }else{
             $(this).parent('.hamburger').addClass("active");
         }
     })
 })
 $(document).ready(function(){
    $('.menu-footer__close').click(function(){
        $(this).parents('.hamburger').removeClass('active');
    })
})
$(document).ready(function(){

    $('.form-next button').click(function(event){
        event.preventDefault()
        $(this).parents('.hamburger').removeClass('active');
    })
    function validateNumbersWithHyphens(input) {
        var numbersOnlyPattern = /^\d+$/;

        var numbersWithHyphensPattern = /^\d+(-\d+)*$/;
        return (
            (numbersOnlyPattern.test(input) || numbersWithHyphensPattern.test(input)) &&
            input.length >= 10 &&
            input.length <= 14
        );
    }
    $.validator.addMethod("japanPhone", function(value, element) {
        var japanPhoneRegex = /^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/;
        return this.optional(element) || validateNumbersWithHyphens(value);
    }, "電話番号は数字（ハイフンのみ入力可）で入力してください");

    $("#form").validate({
        rules: {
            "ご相談の背景": {required: true, minlength: 10, maxlength: 900},
            "具体的なお困りごとやご不安、解決したいこと": {required: true, minlength: 10, maxlength: 600},
            "ご年齢": "required",
            "主な疾患・病気の状況": "required",
            "ご本人のお住まいのエリア": "required",
            "お名前": "required",
            "今過ごされている場所": "required",
            "性別": "required",
            "ご希望のご連絡方法": "required"
        },
        messages: {
            "ご相談の背景": {
                required: '必ず入力をお願いします',
                minlength: '10文字以上900文字以内で、ご入力ください。',
                maxlength: '10文字以上900文字以内で、ご入力ください。'
            },
            "具体的なお困りごとやご不安、解決したいこと": {
                required: '必ず入力をお願いします',
                minlength: '10文字以上600文字以内で、ご入力ください。',
                maxlength: '10文字以上600文字以内で、ご入力ください。'
            },
            "ご年齢": {
                required: '必須項目です'
            },
            "主な疾患・病気の状況": {
                required: '必ず入力をお願いします'
            },
            "ご本人のお住まいのエリア": {
                required: '必ず入力をお願いします'
            },
            "お名前": {
                required: '必ず入力をお願いします'
            },
            "今過ごされている場所": {
                required: '必ず入力をお願いします'
            }
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
    $('.form-button__btn').click(function(){
        if( !$('#item1').prop("checked") && !$('#item2').prop("checked")){
            $('#item1').addClass('error');
            $('.options').addClass('error');
        }
        if( !$('#item-1').prop("checked") && !$('#item-2').prop("checked") && !$('#item-3').prop("checked") ){
            $('#item-1').addClass('error');
            $('.form-radio-input').addClass('error');
        }
    })
    $('.options').click(function(){
        if( $('#item1').prop("checked") || $('#item2').prop("checked")){
            $('#item1').removeClass('error');
            $('.options').removeClass('error');

        }
    })
    $('.options-2').click(function(){
        if( $('#item-1').prop("checked") || $('#item-2').prop("checked") || $('#item-3').prop("checked") ){
            $('#item-1').removeClass('error');
            $('.form-radio-input').removeClass('error');
        }
    })
   $('textarea,input').keyup(function(){
    $(this).removeClass('error');
   })

    $(".page__three__form textarea, .page__three__form input, .page__three__form select").on("click", function (e) {
        var formInput = $(this).closest(".form-input");
        var t = $(this);
        setTimeout(function () {
            formInput.find('label.error').hide();
            t.removeClass("error");
        }, 100);
    })


    $(".options-2 .item-radio").on("change", function () {
        $(".input-disable .input1, .input-disable .input2 ").removeClass("error");
        if($(this).val() == 4){
            $('.input1').attr('disabled','true');
            $('.input2').removeAttr('disabled');
            $('.input2').focus();
            $("#d_phone").rules("add", {
                required: true,
                japanPhone: true,
                messages: {
                    required: "必須項目です"
                }
            });
        }else{
            $('.input2').attr('disabled','true');
            $('.input1').removeAttr('disabled');
            $('.input1').focus();
            $("#d_email").rules("add", {
                required: true,
                email: true,
                messages: {
                    required: "必須項目です",
                    email: "メールアドレスは英数字・記号で入力してください"
                }
            });
        }
    })
    
})