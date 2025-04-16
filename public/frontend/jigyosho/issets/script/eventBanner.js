function makeDelay(ms) {
  let timer = 0;
  return function (callback) {
    clearTimeout(timer);
    timer = setTimeout(callback, ms);
  };
}

$('.select-btn__item--pink').on('click', function () {
  console.log(arrCheckBoxBanner);
  delay(handleSubmitCheckbox);
});

$('#button-clear').click(function () {
  handleClearCheckbox();
});

const handleChangTextPost = () => {
  if (checkForm()) {
    arrowEnd();
    handleBtnActive();
  } else {
    arrowMiddle();
    handleBtnBase();
  }
};

const handleChangeTextAddress = () => {
  if (checkForm()) {
    arrowEnd();
    handleBtnActive();
  } else {
    arrowMiddle();
    handleBtnBase();
  }
};

let delay = makeDelay(30);
$('#input-post').on('keyup', function () {
  if($('#input-post').val().length == 7 ){
    delay(handleChangTextPost);
  }
  else{
    $('#datalist-input').val('');
    $('#addressTwo').val('');
    $('#addressThree').val('');
    handleBtnBase();
  }
});

$('#input-post').on('blur', function () {
  if($('#input-post').val().length == 7 ){
    delay(handleChangTextPost);
  }
});

$('#input-post').on('focus', function () {
  arrowMiddle();
});


$('#addressThree').on('keyup', function(){
  if($('#addressThree').val() == ''  ){
    handleBtnBase();
  } else {
    handleBtnActive();
  }
})


$('#addressTwo').on('focus', function () {
  $('#input-post').removeClass('active');
  $('#addressTwo').addClass('active');
  $('#addressThree').removeClass('active');
  $('.banner-info-input__arrow-icon').css(getWidth('roundTwo'));
  
});

$('#addressThree').on('focus', function () {
  $('#input-post').removeClass('active');
  $('#addressTwo').removeClass('active');
  $('#addressThree').addClass('active');
  $('.banner-info-input__arrow-icon').css(getWidth('roundThree'));
});