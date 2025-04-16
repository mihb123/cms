$(document).ready(function(){
  $('.no-menu-button').hover(function(){
    $('.icon-show').toggleClass('d-show');
  })
  $('.content-nav').find('li').hover(function(){
    $(this).find('.ls-mark-pink').toggleClass('d-pc-none');
  })
  $('.new-desc').hover(function(){
    $(this).find('.ls-mark-pink').toggleClass('d-show');
  })
  $('.no-menu-button').click(function(){
    if($('.box-nav').hasClass('d-show')){
      console.log(1);
      $('.box-nav').css('animation', 'notshow 0.3s');
    }else{
      $('.box-nav').css('animation', 'show 0.3s');
    }
    setTimeout(function(){
      $('.box-nav').toggleClass('d-show');
    },300)
  })
  $('.menu-mobile').click(function(){
    $('.tab-left').toggleClass('d-show');
  })
  $('.btn_close').click(function(){
    $('.tab-left').toggleClass('d-show');
  })
  // $('.box-option-close').click(function(){
  //   if($('.box-nav').hasClass('d-show')){
  //     $('.box-nav').css('animation', 'notshow 0.3s');
  //   }else{
  //     $('.box-nav').css('animation', 'show 0.3s');
  //   }
  //   setTimeout(function(){
  //     $('.box-nav').toggleClass('d-show');
  //   },300)
  // })
  $('#item-1').click(function(){
    if($(this).prop("checked") == true || $('#item-3').prop("checked")== true ){
        $('.input1').removeAttr('disabled');
        $('.input1').focus();
    } else{
        $('.input1').attr('disabled','true');
    }
})
$('#item-3').click(function(){
    if($(this).prop("checked") == true || $('#item-1').prop("checked")== true){
        $('.input1').removeAttr('disabled');
        $('.input1').focus();
    } else{
        $('.input1').attr('disabled','true');
    }
})
$('#item-2').click(function(){
    if($(this).prop("checked") == true){
        $('.input2').removeAttr('disabled');            
        $('.input2').focus();
    } else{
        $('.input2').attr('disabled','true');
    }
})
$("#form").validate({
  rules: {
    text_1: "required",
    text_2: "required",
    text_3:"required"
  },
  submitHandler: function(form) {
    form.submit();
  }
});
$('.form-button__btn').click(function(){
  if( !$('#item-1').prop("checked") && !$('#item-2').prop("checked") && !$('#item-3').prop("checked") ){
      $('#item-1').addClass('error');
      $('.form-radio-input').addClass('error');
  }
})
$('.options').click(function(){
  if( $('#item-1').prop("checked") || $('#item-2').prop("checked") || $('#item-3').prop("checked") ){
      $('#item-1').removeClass('error');
      $('.form-radio-input').removeClass('error');
  }
})
$('textarea,input').keyup(function(){
$(this).removeClass('error');
})
})