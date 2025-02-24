import './index.scss';

const share__icon = $('.share__icon');
const share__menu = $('.share__menu');

$(document).click(function (event) {
    if (!$(event.target).closest('.share').length) {
        hideShare();
    }
});

share__icon.click(function () {
    targetShare();
});

function targetShare() {
    if (share__menu.css("display") == "flex") {
        hideShare();
    } else {
        share__menu.slideDown().css("display", "flex");
    }
}

function hideShare() {
    share__menu.slideUp();
}