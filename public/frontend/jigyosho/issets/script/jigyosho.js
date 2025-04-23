function toggleSelect() {
  const $dropDown = $('.reChosen-dropdown');
  if ($dropDown.css('display') !== 'block') {
    $dropDown.css('display', 'block');
  } else {
    $dropDown.css('display', 'none');
  }
}

function activeCategory() {
  $('#search-option-category-parent').addClass('active');
  $('#search-option-category').addClass('category-enabled');
  $('.layer-category').hide();
}

function deactiveCategory() {
  $('#search-option-category-parent').removeClass('active');
  $('#search-option-category').removeClass('category-enabled');
  $('.layer-category').show();
}

function removeActiveArea() {
  const addressDropdown = $('.search-option-title.option-address__toggle-dropdown');
  const addressMap = $('.search-option-title.option-address__toggle-map');
  if (addressDropdown.length) {
    addressDropdown.removeClass('active');
  }
  if (addressMap.length) {
    addressMap.removeClass('active');
  }
}

function showAreaLayer() {
  $('.layer-dropdown-and-map.blur-part2').show();
}

function hideAreaLayer() {
  $('.layer-dropdown-and-map.blur-part2').hide();
}

function showAddressOption() {
  const $options = $('.search-option-title.option-address__toggle-dropdown');
  const activeNoPopup = $options.filter('.active').not('.address_popup_area').length > 0;
  const activeMap = $options.filter('.active.address_popup_area').length > 0;

  if (activeNoPopup) {
    $('.option-address').css('display', 'grid');
  } else if (activeMap) {
    $('.option-address').each(function () {
      $(this).show();
    });
  } else {
    const addr = $('.option-address');
    addr.each(function () {
      $(this).hide();
    });
  }
}

function showMapOption() {
  const mapOption = $('.search-option-title.option-address__toggle-map');

  const activeNoPopup = mapOption.filter('.active').not('.map_popup_area').length > 0;
  const activeMap = mapOption.filter('.active.map_popup_area').length > 0;
  if (activeNoPopup || activeMap) {
    $('#clickable-map').show();
    $('#popup-area-layer #clickable-map').show()
  } else {
    $('#clickable-map').hide();
    $('#popup-area-layer #clickable-map').hide();
  }
}

function hideMapOption() {
  const mapOption = $('.search-option-title.option-address__toggle-map');
  const activeNoPopup = mapOption.filter('.active').not('.map_popup_area').length > 0;
  const activeMap = mapOption.filter('.active.map_popup_area').length > 0;
  if (activeNoPopup || activeMap) {
    $('#clickable-map').hide();
    $('#popup-area-layer #clickable-map').hide();
  }
}

function addressPopActive() {
  $('.option-address__toggle-dropdown.address_popup_area').addClass('active');
  showAddressOption();
}

function mapPopActive() {
  const map = $('.option-address__toggle-map.map_popup_area');
  map.addClass('active');
  showMapOption();
}

function removeAddressOption() {
  const inputs = $('input[name="cb_addr21');
  inputs.prop('checked', false);
}

function removeActiveClickMap() {
  $('.click-map').removeClass('activeClickMap');
}

function updateAddressPop(id) {
  const inputPop = $('#popup-area-layer input[name="cb_addr21"]')
  const inputPop2 = $('input[name="cb_addr21"]').not('.popup_area')
  removeAddressOption()
  // set checked of inputPop
  if (id) {
    const selectedInputPop = inputPop.filter('#' + id);
    const selectedInputPop2 = inputPop2.filter('#' + id);
    selectedInputPop.prop('checked', true);
    selectedInputPop2.prop('checked', true);
    const button = selectedInputPop.closest('.option-address__check-box').find(
      '.select-btn2__item--pink.select-round');
    button.removeClass('disabled');
  }
}

function clearOption(param) {
  const $param = $(param); // ✅ convert to jQuery object
  const inputs = $param.closest('.option-address__check-box').find('input[name="cb_addr21"]');
  inputs.prop('checked', false);
}

function resetCategoryOption() {
  const optionCategoryRowItem = $('.option-category-row-item');
  // Reset all items
  optionCategoryRowItem.each((_, item) => {
    const $item = $(item);
    const radio = $item.find('input[type="radio"]');
    const rowItemImg = $item.find('.option-category-row-item-img');
    const checkIcon = $item.find('.check-icon');
    rowItemImg.css({
      width: '40%',
      height: '180%',
      right: '-10%',
      top: '-30%'
    }).removeClass('no-hover');
    checkIcon.hide();
    radio.prop('checked', false);
  });
}

function clearCategory() {
  resetCategoryOption() // Reset all items
  $('#selected-category').val('');
  hidePopupArea();
}

function updateMapPop(id) {
  const selectedPath = $('#popup-area-layer path[id="' + id + '"]');
  selectedPath.closest('.click-map').addClass('activeClickMap');
}

function showDropdownPop() {
  const selected = $('#popup-area-layer input[name="cb_addr21"]:checked');
  const divParent = selected.closest('.option-address__toggle');
  divParent.find('.option-address__arrow-icon').show();
  divParent.find('.option-address__check-box').show();
}

function hideDropdownPop() {
  const divParent = $('.option-address__toggle').closest('.option-address.address_popup_area');
  divParent.find('.option-address__arrow-icon').hide();
  divParent.find('.option-address__check-box').hide();
}

function hideDropdown() {
  const divParent = $('.option-address__toggle').closest('.option-address').not('.address_popup_area');
  divParent.find('.option-address__arrow-icon').hide();
  divParent.find('.option-address__check-box').hide();
}

function showPopupArea() {
  $("#popup-area-layer").addClass('active');
}

function hidePopupArea() {
  $("#popup-area-layer").removeClass('active');
}

function showPopup() {
  $('#overlay').addClass('show');
}

function closePopup() {
  $('#overlay').removeClass('show');
}

function resetCategorySelect() {
  closePopup();
  clearCategory();
}

function resetAreaSelect() {
  const optionCategoryRowItem = $('.option-category-row-item');
  const optionAddressContainer = $('.option-address-container');
  const check = $("#from-tab").val();
  $('.' + check).addClass('active');
  optionAddressContainer.css({
    'padding-top': '0',
    'padding-bottom': '5%',
    'background-color': '#ffffff'
  });
  $('.search-map-or-dropdown-result').hide();
  $('.text-address').css('display', 'block');
  if (check === 'option-address__toggle-map') {
    $('#clickable-map').css('display', 'block');
    showPopupArea();
    mapPopActive();
  } else if (check === 'option-address__toggle-dropdown') {
    $('.option-address').css('display', 'grid');
    showPopupArea();
    addressPopActive();
    showDropdownPop();
    hideDropdown();
  }
  closePopup();
}