$(function () {
  $(document).ready(function() {
    var list_count = 0;
    $(".btn_more").click(function(){
      list_count++;
      console.log(list_count);
      $(".stationlist").eq(list_count).fadeIn(300);
    });
  });
});
