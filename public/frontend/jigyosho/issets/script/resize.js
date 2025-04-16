$(window).on('resize', function () {
  handleMenu();
});

$(window).on('load', function () {
  handleMenu();
});

const handleMenu = () => {
  if ($(this).height() <= 500) {
    $('.box-option').css({ height: '30rem' });
  } else if ($(this).height() <= 740) {
    $('.box-option').css({ height: '40rem' });
  } else {
    $('.box-option').css({ height: 'unset' });
  }
};
