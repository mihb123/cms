$(document).ready(function(){
    $('.no-menu-button').hover(function(){
      $('.icon-show').toggleClass('d-show');
    })
    $('.content-nav').find('li').hover(function(){
      $(this).find('.ls-mark-pink').toggleClass('d-none');
    })
    $('.no-menu-button').click(function(){
      $('.box-nav').toggleClass('d-show');
    })

    // $('.qa-question__item .qa-question__item-title').on('click', function (e) {
    //   e.preventDefault();
    //   $(this).parent().toggleClass('active');
    //   let element = $(this).parent().find('.qa-question__content').slideToggle();
    // });
  
  })