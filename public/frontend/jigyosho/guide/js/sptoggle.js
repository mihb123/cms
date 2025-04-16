$(function () {
  $(document).ready(function() {
    var sp_control = 0;
    $(".ham").click(function(){
      if(sp_control == 0) {
        $('.spmenu').fadeIn(200);
        sp_control = 1;
      } else {
        $('.spmenu').fadeOut(100);
        sp_control = 0;
      }
    });
    $(".close").click(function(){
      $('.spmenu').fadeOut(100);
      sp_control = 0;
    });
    
    var sp_control02 = 0;
    $(".ham02").click(function(){
      if(sp_control02 == 0) {
        $('.spmenu02').fadeIn(200);
        sp_control02 = 1;
      } else {
        $('.spmenu02').fadeOut(100);
        sp_control02 = 0;
      }
    });
    $(".close02").click(function(){
      $('.spmenu02').fadeOut(100);
      sp_control02 = 0;
    });
  });
});
