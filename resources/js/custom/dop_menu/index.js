import './mob/index.js';
import './index.scss';

window.dop_menu = $(".dop_menu");
window.dop_menu__bg = $(".dop_menu__bg");
window.dop_menu__open_buttons = $(".dop_menu_mob__button, .dop_menu__open");

dop_menu__open_buttons.click(function () {
    dop_menu.css("display", "block");
    setTimeout(function() {
        dop_menu.addClass("activ");
    }, 100);
    dop_menu__bg.fadeIn(300);
});

$(".dop_menu__close").on("click", function (e) {
    dopMenuClose();
});

window.dopMenuClose = function() {
    dop_menu.removeClass("activ");
    setTimeout(function() {
        dop_menu.css("display", "none");
    }, 100);
    dop_menu__bg.fadeOut(300);
}
