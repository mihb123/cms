var selectedCategory = document.getElementById('selected-category');
var optionAddressContainer = document.querySelector('.option-address-container');
function toggleSelect() {
        let dropDown = document.querySelector('.reChosen-dropdown');
        if (dropDown.style.display !== 'block') {
            dropDown.style.display = 'block';
        } else {
            dropDown.style.display = 'none';
        }
    }
function showPopup() {
      document.getElementById('overlay').classList.add('show');
  }
function closePopup() {
      document.getElementById('overlay').classList.remove('show');
  }
function resetCategorySelect(){
          closePopup()
          clearCategory()
}

function resetAreaSelect(){
  document.querySelector('.'+document.querySelector("#from-tab").value).classList.add('active');
  optionAddressContainer.style.paddingTop = '0';
  optionAddressContainer.style.paddingBottom = '5%';
  optionAddressContainer.style.backgroundColor = '#ffffff';
  document.querySelector('.search-map-or-dropdown-result').style.display='none';
  document.querySelector('.text-address').style.display='block';
  if (document.querySelector("#from-tab").value=='option-address__toggle-map') {
      document.querySelector('#clickable-map').style.display='block';
  }else if(document.querySelector("#from-tab").value=='option-address__toggle-dropdown'){
      document.querySelector('.option-address').style.display='grid';
  }
  closePopup()
}

function showSearchAction() {
  $('#search_action_container').css('display', 'flex');
}

function hideSearchAction() {
  $('#search_action_container').css('display', 'none');
}

function submitPopupForm() {
  document.getElementById('popup-form').submit();
};

function clearCategory(){
  const optionCategoryRowItem = document.querySelectorAll('.option-category-row-item');
  optionCategoryRowItem.forEach((item) => {
    const checkIcon = item.querySelector('.check-icon');
    const radio = item.querySelector('input[type="radio"]');
    checkIcon.style.display = 'none';
    radio.checked = false;      
  });
  lastSelectedItem = null;
  hideSearchAction();
  selectedCategory.value = '';  
}
