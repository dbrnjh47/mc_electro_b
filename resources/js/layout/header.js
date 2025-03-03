

//

$("body").scroll(function () {
    var header = $(".header");
    if ($("body").scrollTop() >= $(".header_two").height()) {
        header.addClass("header__fix");
    } else {
        header.removeClass("header__fix");
    }
});

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
