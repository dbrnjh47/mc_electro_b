import '/resources/scss/layout/burger_menu.scss';

let burger_menu = $(".burger_menu__main");
let burger_menu__bg = $(".burger_menu__bg");

$(".header__burger_menu").click(function () {
    burger_menu.css("display", "block");
    setTimeout(function() {
        burger_menu.addClass("activ");
    }, 100);
    burger_menu__bg.fadeIn(300);
});

$(".burger_menu_close").on("click", function (e) {
    burger_menu.removeClass("activ");
    setTimeout(function() {
        burger_menu.css("display", "none");
    }, 100);
    burger_menu__bg.fadeOut(300);
});

//

$(".burger_menu__main__navigations li > a").on("click", function (e) {
    var isActiv = $(this).hasClass("active");
    burgerMenuCloseNavigations();

    if(!isActiv)
    {
        $(this).addClass("active").closest("li").find(".navigation_list")
        .slideDown();
    }
});

var burger_menu_navigation_lists = $(".burger_menu__main .navigation_list");

function burgerMenuCloseNavigations()
{
    burger_menu_navigation_lists.slideUp().closest("li").find("> a").removeClass("active");
}

//

let currency_select = $('#burger_currency_select select');
currency_select.on('change', function() {
    setCurrency($(this).val());
});
