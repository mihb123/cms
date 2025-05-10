function OnlyThisCheckBox(item) {
    document.getElementById(item.id).checked = true;
}

$(".select-round").click(function () {
    var address21 = $("input[name=cb_addr21]:checked")
        .map(function () {
            return $(this).next().find(".banner-label--middle").text();
        })
        .get();
    document.getElementById("selected-area").value = address21[0];

    const titles = document.querySelectorAll(".search-option-title");

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
    document.querySelector("#from-tab").value = "option-address__toggle-dropdown"
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

