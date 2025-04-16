function OnlyThisCheckBox(
  item
  // className = 'option1-checkbox',
  // list = 'option-address__col-one'
) {
  // const length = $(`.${list} .option-address__checkboxs-item`).length;
  // for (let i = 1; i <= length; i++) {
  //   document.getElementById(className + i).checked = false;
  // }
  document.getElementById(item.id).checked = true;
}

// const clearCheckboxOne = (
//   // className = 'option1-checkbox',
//   list = 'option-address__col-one'
// ) => {
//   // const length = $(`.${list} .option-address__checkboxs-item`).length;
//   // for (let i = 1; i <= length; i++) {
//   //   document.getElementById(className + i).checked = false;
//   // }
//     $(`.${list}`).closest(".option-address__check-box").find(".select-round").addClass('disabled');
// };

// $('#clear-checkbox-op1').click(() => {
//   clearCheckboxOne();
// });

// $('#clear-checkbox-op2').click(() => {
//   clearCheckboxOne('option4-checkbox', 'option-address__col-four');
// });

// $('#clear-checkbox-op3').click(() => {
//   clearCheckboxOne('option7-checkbox', 'option-address__col-seven');
// });

// $('#clear-checkbox-op4').click(() => {
//   clearCheckboxOne('option10-checkbox', 'option-address__col-ten');
// });

// $("#select-round-four").click(function () {
//     $(this).closest(".option-address__check-box--position4").toggle();
//     $("#arrow-four").toggle();
// });

// $("#select-round-three").click(function () {
//     $(this).closest(".option-address__check-box--position3").toggle();
//     $("#arrow-three").toggle();
// });

// $("#select-round-two").click(function () {
//     $(this).closest(".option-address__check-box--position2").toggle();
//     $("#arrow-two").toggle();
// });

// $("#select-round-one").click(function () {
//     $(this).closest(".option-address__check-box--position1").toggle();
//     $("#arrow-one").toggle();
// });

$(".select-round").click(function () {
  // var position = $(this).attr("position");
  // var element = ".option-address__check-box--" + position;
  // $(this).closest(element).toggle();
  // $("#arrow-one").toggle();
  var address21 = $("input[name=cb_addr21]:checked")
      .map(function () {
          return $(this).next().find(".banner-label--middle").text();
      })
      .get();
  document.getElementById("selected-area").value = address21[0];

  const titles = document.querySelectorAll(".search-option-title");
  // document.querySelectorAll(".option-address__arrow-icon").forEach((item) => {
  //     item.style.display = "none";
  // });
  // document.querySelectorAll(".option-address__check-box").forEach((item) => {
  //     item.style.display = "none";
  // });

  titles.forEach((title) => {
      title.classList.remove("active");
  });
  document
      .querySelector(".option-address__toggle-dropdown")
      .classList.add("active");
  document.querySelector(".text-address").style.display = "none";
  document.querySelector(".option-address").style.display = "none";
  document.querySelector("#clickable-map").style.display = "none";
  document.querySelector(".search-map-or-dropdown-result").style.display =
      "block";
  document.querySelectorAll(".search-option-title").forEach((el) => {
      if (!el.classList.contains("option-category__toggle")) {
          el.classList.add("displayResult");
      }
  });
  document
      .querySelectorAll(".section-1 .search-option-title")
      .forEach((el) => {
          el.classList.add("no-after");
      });
  document.querySelector(".option-address-container").style.paddingTop = "4%";
  document.querySelector(".option-address-container").style.paddingBottom =
      "0";
  document.querySelector(".option-address-container").style.backgroundColor =
      "#FDF4F4";
  document.querySelector(".option-category-container").style.backgroundColor =
      "#FDF4F4";
  document
      .querySelector("#search-option-category")
      .classList.add("category-enabled");
  document.querySelector('#search-option-category-parent').style.backgroundColor = "#FDF4F4";
  document.querySelector('#search-option-category-parent').style.borderBottom = "0px solid white";
  document.querySelector(
      "#search-option-category .triangle-indicator"
  ).style.display = "block";
  document.querySelector(".search-option-description").style.color =
      "#FFFFFF";
  document.querySelector(
      ".search-option-logo__img-box--pc-enabled"
  ).style.display = "block";
  document
      .querySelector(
          "#search-option-category .search-option-logo__img-box--pc"
      )
      .classList.add("logoEnable");
  document.querySelectorAll(".layer-category").forEach((el) => {
      el.style.display = "none";
  });
  document.querySelectorAll('.click-map').forEach(item => {
    item.classList.remove('activeClickMap');
});
  document.querySelector("#from-tab").value="option-address__toggle-dropdown"
});

$(".service-item").click(function () {
  var search_category = $(this).attr("data-type");
  window.open =
      "/jigyosho/TopNarrow-1.php?search_category=" + search_category;
});

$(".map__item").click(function () {
  var search_category = $(this).attr("data-type");
  window.open =
      "/jigyosho/TopNarrow-1.php?search_category=" + search_category;
});

// $('#get-checked-values').click(function() {
//   const checkedValues = $('.option-address__col-one .option-address__checkboxs-item input[type="checkbox"]:checked')
//     .map(function() {
//       return this.id;
//     }).get();
//   console.log(checkedValues);
// });
