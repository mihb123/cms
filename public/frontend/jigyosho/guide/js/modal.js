$(function () {
  $(document).ready(function() {
    $(".btn_modal01").click(function(){
      $(".large").fadeIn(300);
    });
    $(".large").click(function(){
      $(".large").fadeOut(200);
    });
    
    $(".large").click(function(){
      $(".large").fadeOut(200);
    });


    $(".btn_modal02").on("click", function() {
      $(".modal02").fadeIn(300);
      $(".btn_modal02").fadeOut(300);
    });

    $(".modal02").on("click", function() {
      $('.modal02').fadeOut(300);
      $(".btn_modal02").fadeIn(300);
    });

    $('.modal02 .modalcontents').on('click' , event => {
      event.stopPropagation();
    })
  });
});
