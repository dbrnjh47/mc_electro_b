

// 

$(".header__world_dropdown svg").click(function () {
    hederCloseMenus();
    var item = $(this).siblings(".header__world_dropdown__menu");
    if (item.css("display") == "none") {
        item.slideDown().css("display", "flex");
    }
});

$(document).click(function (event) {
    if (!$(event.target).closest('.header__world_dropdown').length) {
        hederCloseMenus();
    }
});

function hederCloseMenus() {
    $(".header__world_dropdown__menu").slideUp();
}