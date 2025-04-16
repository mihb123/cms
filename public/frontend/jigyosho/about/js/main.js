// $(document).ready(function () {
//     $(".cross").hide();
//     $(".menu").hide();
//     $(".hamburger").click(function () {
//       $(".menu").slideToggle("slow", function () {
//         $(".hamburger").hide();
//         $(".cross").show();
//       });
//     });

//     $(".cross").click(function () {
//       $(".menu").slideToggle("slow", function () {
//         $(".cross").hide();
//         $(".hamburger").show();
//       });
//     });
//   });

$(document).ready(function () {
  $(".hamburger").click(function () {
    $(this).parents(".mobi-hamburger").addClass("active");
    $('.ovelay').css('display','block');
    $('.company-header').css('background','transparent');
  });
  $(".button-close").click(function () {
    $(this).parents(".mobi-hamburger").removeClass("active");
    $('.ovelay').css('display','none');
    $('.company-header').removeStyle();
  });
  // $('input').keyup(function(){
  //   if($('.no-space').val() !='' && $('no-space-2').val() != '' && $('.no-space-3') != ''){
  //     $('.summary9-btn').find('button').removeClass('no-active');
  //   }
  // })
});

// validate

$(document).ready(function () {
  if($("#formDemo").length) {
    $("#formDemo").validate({
      rules: {
        "お問い合わせ種別": "required",
        "お名前": "required",
        "メールアドレス": {
          required: true,
          // email: true
        },
        "お問い合わせ": "required",
      },
      messages: {
        //"お問い合わせ種別": "種類を選んでください",  //変更 (@ edited by a.u  2023.7.10) 
        "お問い合わせ種別": "必須項目です",
        "お名前": "必須項目です",

        "メールアドレス": {
          required: "必須項目です",
        },
        //"お問い合わせ": "必ず入力をお願いします",  //変更 (@ edited by a.u  2023.7.10) 
        "お問い合わせ": "必須項目です",
      },
    });
  }
});

// map

if($("#map").length) {
  var map = L.map("map").setView([35.62584709241187, 139.42873009800337], 16);

  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  L.marker([35.62632841624932, 139.42566916916815])
      .addTo(map)
      .bindPopup("株式会社パーソナルライフジャパン<br>駅前オフィス")
      .openPopup();

  L.marker([35.62584709241187, 139.42873009800337])
      .addTo(map)
      .bindPopup("株式会社パーソナルライフジャパン<br>本社")
      .openPopup();
}

// Initialize PhotoSwipe
var $pswp = $('.pswp')[0];
var image = [];

$('.summary6-box a').each(function() {
  var src = $(this).attr('href');
  var size = $(this).data('size').split('x');
  var item = {
    src: src,
    w: size[0],
    h: size[1],
    title: ''
  }
  image.push(item);
});

$('.summary6-box').on('click', '.enlarge-zoom', function(event) {
  event.preventDefault();
  var options = {
    index: 0,
    bgOpacity: 0.85,
    showHideOpacity: true
  }
  var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, image, options);
  gallery.init();
});