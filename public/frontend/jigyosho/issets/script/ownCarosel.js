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
    nav: false,
    autoWidth: false,
  });

  let owlHistory = $('.owl-carousel.history-list-mobile').owlCarousel();

  $('.history-list-mobile__btn-next').click(function () {
    owlHistory.trigger('next.owl.carousel');
  });

  $('.history-list-mobile__btn-back').click(function () {
    owlHistory.trigger('prev.owl.carousel', [300]);
  });

  $('.owl-carousel#sidebarTwo').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    dots: false,
    nav: false,
    autoWidth: true,
    items: 2,
    responsive: {
      0: {
        margin: 8,
      },

      410: {
        margin: 10,
      },

      410: {
        margin: 10,
      },
    },
  });

  let owlHistorySP = $('.owl-carousel#sidebarTwo').owlCarousel();

  $('.event-mobile__btn-next').click(function () {
    owlHistorySP.trigger('next.owl.carousel');
  });

  $('.event-mobile__btn-back').click(function () {
    owlHistorySP.trigger('prev.owl.carousel', [300]);
  });
});
