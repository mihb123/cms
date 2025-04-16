let arrCheckBoxBanner = [];

const textDefault = '選んでください（例：訪問入浴)';

let value = $(window).width();
let base = {
  transform: 'translate(1rem,0)',
  transition: 'all 0.25s',
};

let cssArrowBanner = {
  transform: 'translate(1rem,0)',
  transition: 'all 0.25s',
};
if (value <= 768) {
  base = {
    transform: 'translate(0.5vw,0)',
    transition: 'all 0.25s',
  };

  cssArrowBanner = {
    transform: 'translate(0.5vw),0)',
    transition: 'all 0.25s',
  };
}

// start animation hover select form
$('.banner-form-select').mouseover(() => {
  let value = $(window).width();
  if (value > 768) {
    if (arrCheckBoxBanner.length == 0) {
      cssArrowBanner = { ...cssArrowBanner, transform: 'translate(1rem,0)' };
      $('.banner-info-input__arrow-icon').css(cssArrowBanner);
    }
  }
});

$('.banner-form-select').mouseout(() => {
  let value = $(window).width();
  if (value > 768) {
    if (arrCheckBoxBanner.length == 0) {
      cssArrowBanner = { ...cssArrowBanner, transform: 'translate(0,0)' };
      $('.banner-info-input__arrow-icon').css(cssArrowBanner);
    }
  }
});
// end animation hover select form

let valueInputBanner = [];
// event checkbox in banner
$('.banner-checkboxs__item').each(function (item) {
  let checkbox = $(this).children('.banner-checkboxs__item-ip');

  checkbox.change(function () {
    $('.select-btn__item--pink').click(() => {
      valueInputBanner = $(this).parent().children('.banner-label');
      let isCheck = $(this).is(':checked');
      if (isCheck) {
        let val = valueInputBanner.text().replace(/\s/g, '');
        arrCheckBoxBanner = [val];
      }
    });
  });
});

// event nav
$('.menu-btn__hamburgers').click(() => {
  $('.box-nav').toggle('fast');
});
$('.box-option-close').click(() => {
  $('.box-nav').toggle('fast');
});

// event select banner
$('.banner-form-select ').click(function (e) {
  if (e.target == this) {
    $('.banner-list-select').toggle();
    $('.banner__coating').toggle();
  }
});

$('.banner__coating').click(function () {
  $(this).hide();
  $('.banner-list-select').hide();
  handleClearCheckboxBase();
});

// event toggle menu sp
$('.menu-col').click((e) => {
  let element = e.currentTarget.querySelector('.menu-list');

  $(element).toggle('slow');
});

// event q&a
// $('.qa-question__item .qa-question__item-title').on('click', function (e) {
//   e.preventDefault();
//   $(this).parent().toggleClass('active');
//   let element = $(this).parent().find('.qa-question__content').slideToggle();
// });

// event toggle checkbok
$('.option-address__toggle .option-address__item').on('click', function (e) {
  e.preventDefault();

  let elementBox = $(this)
    .closest('.option-address__toggle')
    .find('.option-address__check-box');

  $('.option-address__check-box').each(function (item) {
    if ($(this)[0].className.trim() != elementBox[0].className.trim()) {
      $(this).css({ display: 'none' });
    }
  });
  let elementIcon = $(this)
    .closest('.option-address__toggle')
    .find('.option-address__arrow-icon');

  $('.option-address__arrow-icon').each(function (item) {
    if ($(this)[0].className.trim() != elementIcon[0].className.trim()) {
      $(this).css({ display: 'none' });
    }
  });

  $(this)
    .closest('.option-address__toggle')
    .find('.option-address__check-box')
    .toggle('fast');
  $(this)
    .closest('.option-address__toggle')
    .find('.option-address__arrow-icon')
    .toggle('fast');
});

// save data checkbox in banner

// handle checkbox
function selectOnlyThis(item, className = 'checkbox-') {
  const length = $('.banner-checkbox-item').length;
  for (var i = 1; i <= length; i++) {
    document.getElementById(className + i).checked = false;
  }
  document.getElementById(item.id).checked = true;
}

// hover link icon arrow sidebar
$('.history-brown-link').mouseover(() => {
  $('.history-brown-link__img svg path').attr('fill', '#4B92DC');
});

$('.history-brown-link').mouseout(() => {
  $('.history-brown-link__img svg path').attr('fill', '#dcdcdc');
});

// handle button banner
const cssBack = {
  'background-color': '#dedede',
  'background-image': 'unset',
};
const css = {
  'background-image':
    'linear-gradient(to bottom, rgba(239, 136, 155, 0.5) 0, rgba(239, 136, 155, 0.8) 30%, rgba(240, 135, 153, 0.93) 50%, rgb(240, 135, 153) 100%)',
};
$('.banner-form-money__input--middle').blur(function () {
  const cssBack = {
    'background-color': '#dedede',
    'background-image': 'unset',
  };

  if ($(this).val().trim() == 0) {
    $('.banner-form-province').val('');
    $('#addressTwo').val('');
    $('#addressThree').val('');
  }

  if ($(this).val().trim().length > 0 && checkForm()) {
    $('.banner-form-btn__box')
      .delay(100)
      .queue(function (next) {
        $(this).addClass('active');
        $(this).css(css);
        $(this).children().css({ color: 'white' });
        $(this)
          .children('.banner-form-btn__img')
          //本サイト用 (@ edited by a.u  2022.07.26)
          //.attr('src', './issets/images/arrow-bt.svg');
          //ローカルテスト用 (@ edited by a.u  2022.07.26)
          .attr('src', '../../issets/images/arrow-bt.svg');
        next();
      });
  } else {
    $('.banner-form-btn__box')
      .delay(100)
      .queue(function (next) {
        $(this).css(cssBack);
        $(this).removeClass('active');
        $(this).children().css({ color: 'rgba(84, 84, 84, 0.55)' });
        $(this)
          .children('.banner-form-btn__img')
          //本サイト用 (@ edited by a.u  2022.07.26)
          //.attr('src', './issets/images/icon_banner/≫.svg');
          //ローカルテスト用 (@ edited by a.u  2022.07.26)
          .attr('src', '../../issets/images/icon_banner/≫.svg');
        next();
      });
  }
});

// back button head
$('.back-button-head').click(() => {
  $(window).scrollTop(0);
});

$(window).scroll(() => {
  let pos = $(window).scrollTop();
  pos > 200
    ? $('.back-button-head').css({ display: 'block' })
    : $('.back-button-head').css({ display: 'none' });
});

class DataList {
  constructor(containerId, inputId, listId, options) {
    this.containerId = containerId;
    this.inputId = inputId;
    this.listId = listId;
    this.options = options;
  }

  create(filter = '') {
    const list = document.getElementById(this.listId);
    const filterOptions = this.options.filter(
      (d) => filter === '' || d.text.includes(filter)
    );

    if (filterOptions.length === 0) {
      list.classList.remove('active');
    } else {
      list.classList.add('active');
    }

    list.innerHTML = filterOptions
      .map((o) => `<li id=${o.value}>${o.text}</li>`)
      .join('');
  }

  addListeners(datalist) {
    const container = document.getElementById(this.containerId);
    const input = document.getElementById(this.inputId);
    const list = document.getElementById(this.listId);
    container.addEventListener('click', (e) => {
      if (e.target.id === this.inputId) {
        container.classList.toggle('active');
        $('.banner__coating-two').toggle();
      } else if (e.target.id === 'datalist-icon') {
        container.classList.toggle('active');
        input.focus();
      }
    });

    input.addEventListener('input', function (e) {
      if (!container.classList.contains('active')) {
        container.classList.add('active');
      }

      datalist.create(input.value);
    });

    list.addEventListener('click', function (e) {
      if (e.target.nodeName.toLocaleLowerCase() === 'li') {
        input.value = e.target.innerText;
        container.classList.remove('active');
      }
    });
  }
}

$('.banner__coating-two').click(function () {
  $('#datalist').removeClass('active');
  $(this).toggle();
});

const data = [
  { value: '北海道', text: '北海道' },
  { value: '青森県', text: '青森県' },
  { value: '岩手県', text: '岩手県' },
  { value: '宮城県', text: '宮城県' },
  { value: '秋田県', text: '秋田県' },
  { value: '山形県', text: '山形県' },
  { value: '福島県', text: '福島県' },
  { value: '茨城県', text: '茨城県' },
  { value: '栃木県', text: '栃木県' },
  { value: '群馬県', text: '群馬県' },
  { value: '埼玉県', text: '埼玉県' },
  { value: '千葉県', text: '千葉県' },
  { value: '東京都', text: '東京都' },
  { value: '神奈川県', text: '神奈川県' },
  { value: '新潟県', text: '新潟県' },
  { value: '富山県', text: '富山県' },
  { value: '石川県', text: '石川県' },
  { value: '福井県', text: '福井県' },
  { value: '山梨県', text: '山梨県' },
  { value: '長野県', text: '長野県' },
  { value: '岐阜県', text: '岐阜県' },
  { value: '静岡県', text: '静岡県' },
  { value: '愛知県', text: '愛知県' },
  { value: '三重県', text: '三重県' },
  { value: '滋賀県', text: '滋賀県' },
  { value: '京都府', text: '京都府' },
  { value: '大阪府', text: '大阪府' },
  { value: '兵庫県', text: '兵庫県' },
  { value: '奈良県', text: '奈良県' },
  { value: '和歌山県', text: '和歌山県' },
  { value: '鳥取県', text: '鳥取県' },
  { value: '島根県', text: '島根県' },
  { value: '岡山県', text: '岡山県' },
  { value: '広島県', text: '広島県' },
  { value: '山口県', text: '山口県' },
  { value: '徳島県', text: '徳島県' },
  { value: '香川県', text: '香川県' },
  { value: '愛媛県', text: '愛媛県' },
  { value: '高知県', text: '高知県' },
  { value: '福岡県', text: '福岡県' },
  { value: '佐賀県', text: '佐賀県' },
  { value: '長崎県', text: '長崎県' },
  { value: '熊本県', text: '熊本県' },
  { value: '大分県', text: '大分県' },
  { value: '宮崎県', text: '宮崎県' },
  { value: '鹿児島県 ', text: '鹿児島県' },
  { value: '沖縄県', text: '沖縄県' },
];

const datalist = new DataList(
  'datalist',
  'datalist-input',
  'datalist-ul',
  data
);
datalist.create();
datalist.addListeners(datalist);

$('#back-top-extension').click(() => {
  $(window).scrollTop(0);
});

$('#back-top-search').click(() => {
  let bannerContent = $('.banner-content').position().top;
  $(window).scrollTop(bannerContent);
});

$('#back-top-qna').click(() => {
  const getPos = $('.q-and-a').position().top;
  $(window).scrollTop(getPos);
});
