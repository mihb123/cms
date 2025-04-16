// get width window
const getWidth = (type = 'roundOne') => {
  let value = $(window).width();
  if (type == 'roundOne') {
    cssArrowBanner = { ...cssArrowBanner, transform: 'translate(1rem,13rem)' };
    if (value <= 768) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(0,13vw)',
      };
    } else if (value <= 867) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,14.7rem)',
      };
    } else if (value <= 960) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,16.5rem)',
      };
    }
  }

  if (type == 'roundTwo') {
    cssArrowBanner = {
      ...cssArrowBanner,
      transform: 'translate(1rem,23.5rem)',
    };
    if (value <= 768) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(0,36vw)',
      };
    } else if (value <= 867) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,30.7rem)',
      };
    } else if (value <= 960) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,32.5rem)',
      };
    }
  }

  if (type == 'roundThree') {
    cssArrowBanner = {
      ...cssArrowBanner,
      transform: 'translate(1rem,28.5rem)',
    };
    if (value <= 768) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(0,36vw)',
      };
    } else if (value <= 867) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,30.7rem)',
      };
    } else if (value <= 960) {
      cssArrowBanner = {
        ...cssArrowBanner,
        transform: 'translate(1rem,32.5rem)',
      };
    }
  }
  
  return cssArrowBanner;
};

const cssBtnBase = {
  'background-color': '#dedede',
  'background-image': 'unset',
};

const cssBtnActive = {
  'background-image':
    'linear-gradient(to bottom, rgba(239, 136, 155, 0.5) 0, rgba(239, 136, 155, 0.8) 30%, rgba(240, 135, 153, 0.93) 50%, rgb(240, 135, 153) 100%)',
};

const handleClearCheckbox = () => {
  const length = $('.banner-checkbox-item').length;
  for (var i = 1; i <= length; i++) {
    document.getElementById('checkbox-' + i).checked = false;
  }
  cssArrowBanner = base;
  arrCheckBoxBanner = [];
  valueInputBanner = [];

  arrayStart();
  $('.banner-form-select__text').text(textDefault);
};

const handleClearCheckboxBase = () => {
  if (arrCheckBoxBanner.length > 0) return false;
  const length = $('.banner-checkbox-item').length;
  for (var i = 1; i <= length; i++) {
    document.getElementById('checkbox-' + i).checked = false;
  }
  arrCheckBoxBanner = [];
  valueInputBanner = [];
};

const handleSubmitCheckbox = () => {
  if (arrCheckBoxBanner.length > 0) {
    valueInputBanner.addClass('active-banner');
    let value = valueInputBanner[0].outerHTML;
    valueInputBanner.removeClass('active-banner');

    $('.banner-form-select__text').html(value);
    $('.banner-list-select').toggle();
    $('.banner__coating').toggle();
    arrowMiddle();
  }
};

const checkForm = () => {
  let value = $('.banner-form-province').val();
  let value2 = $('#addressTwo').val();
  let value3 = $('#addressThree').val();

  return (
    arrCheckBoxBanner.length > 0 &&
    value.trim().length > 0 &&
    value2.trim().length > 0 &&
    value3.trim().length > 0
  );
};

const handleBtnBase = () => {
  $('.banner-form-btn__box')
    .delay(20)
    .queue(function (next) {
      $(this).css(cssBack);
      $(this).children().css({ color: 'rgba(84, 84, 84, 0.55)' });
      $(this)
        .children('.banner-form-btn__img')
        .attr('src', './issets/images/icon_banner/≫.svg');
      next();
    });
};

const handleBtnActive = () => {
  $('.banner-form-btn__box')
    .delay(20)
    .queue(function (next) {
      $(this).addClass('active');
      $(this).css(css);
      $(this).children().css({ color: 'white' });
      $(this)
        .children('.banner-form-btn__img')
        .attr('src', './issets/images/arrow-bt.svg');
      next();
    });
};

const arrayStart = () => {
  $('#input-post').removeClass('active');
  $('#input-post').attr('disabled', 'true');

  $('#addressTwo').removeClass('active');
  $('#addressTwo').attr('disabled', 'true');

  $('#addressThree').removeClass('active');
  $('#addressThree').attr('disabled', 'true');

  $('.banner-info-input__arrow-icon').css(getWidth(''));
  handleBtnBase();
};

const arrowMiddle = () => {
  $('#input-post').addClass('active');
  $('#input-post').attr('disabled', false);
  
  $('#addressTwo').removeClass('active');
  $('#addressTwo').attr('disabled', false);


  $('#addressThree').removeClass('active');
  $('#addressThree').attr('disabled', false);

  $('.banner-info-input__arrow-icon').css(getWidth('roundOne'));
};

const arrowThree = () => {
  $('#input-post').removeClass('active'); 
  $('#input-post').attr('disabled', false);
  
  $('#addressTwo').addClass('active');
  $('#addressTwo').attr('disabled', false);
  
  $('#addressThree').removeClass('active');
  $('#addressThree').attr('disabled', false);

  $('.banner-info-input__arrow-icon').css(getWidth('roundTow'));
};


const arrowEnd = () => {
  $('#addressThree').addClass('active');
  $('#addressThree').attr('disabled', false);
  $('#input-post').removeAttr('disabled');
  $('#input-post').removeClass('active');
  $('.banner-info-input__arrow-icon').css(getWidth('roundThree'));
  // $('#addressThree').css({ outline: '5px solid #f5a7b5' });
  // $('#addressThree').css({ 'outline-offset': '-3px' }); 
  
  if($('#input-post').val().length == 7 ){
    $('#addressThree').focus();
  }
};
$(document).on('click','.banner-slide-btn__button-text', function(){
	const length = $('.banner-checkbox-item').length;
	for (var i = 1; i <= length; i++) {
    $('#checkbox-'+i).prop('checked',false);
	}
	var id = $(this).attr("data-id");
  $('#checkbox-'+id).prop('checked',true);
  $('.banner-form-select__text').html($('#checkbox-'+id).val());
});


$('.menu-tab__text--double').click(function(){
	const length = $('.banner-checkbox-item').length;
	for (var i = 1; i <= length; i++) {
		$('#checkbox-'+i).prop('checked',false);
	}
	var id = $(this).attr("data-id");
  $('#checkbox-'+id).prop('checked',true);
  $('.banner-form-select__text').html($('#checkbox-'+id).val());
});

$('.menu-tab__text').click(function(){
	const length = $('.banner-checkbox-item').length;
	for (var i = 1; i <= length; i++) {
		$('#checkbox-'+i).prop('checked',false);
	}
	var id = $(this).attr("data-id");
  $('#checkbox-'+id).prop('checked',true);
  $('.banner-form-select__text').html($('#checkbox-'+id).val());
});

$('.s-sp-item, .service-item, .map__item').click(function(){
	var type = $(this).attr("data-type");
  window.location = "./TopNarrow-1.php?search_category=" + type;
});
$('.data-item').click(function(){
  console.log(1);
  var type = $(this).attr("data-type");
  window.location = "../TopNarrow-1.php?search_category=" + type;
});



const closeDropDown = () => {
    const block = document.querySelectorAll('.option-address__check-box')
    const arrow = document.querySelectorAll('.option-address__arrow-icon')
    document.querySelectorAll('.section-2').forEach(elm => {
      elm.addEventListener('click', () => {
        arrow.forEach(item => {
          item.style.display = "none"
        })
        block.forEach(item => {
          item.style.display = "none"
        })
      })
    })
}

