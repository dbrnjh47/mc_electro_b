import "/resources/scss/category/filters.scss";
import '/resources/js/custom/ion-rangeslider/index.js';

import '/resources/js/custom/select2/select2_more.js';
import '/resources/js/custom/dop_menu/index.js';

let filter = $(".filter");

$(".filter__header").click(function () {
    let filter__item = $(this).closest(".filter__item");
    let filter__body = filter__item.find(".filter__body");

    if (filter__item.hasClass("open")) {
        filter__body.slideUp(300);
    } else {
        filter__body.slideDown(300);
    }

    setTimeout(function () {
        if (filter__item.hasClass("open")) {
            filter__item.removeClass("open");
        } else {
            filter__item.addClass("open");
        }
    }, 300);
});


jQuery(document).ready(function () {
    let d = getDataSelect2();
    d["dropdownCssClass"] = "select2_filter";
    d["minimumResultsForSearch"] = 5;
    d["escapeMarkup"] = function (markup) {
        return markup; // Отключаем экранирование HTML
    };
    d["templateResult"] = function (data) {
        let text = data.text;
        data.disabled = true;
        let count = jQuery(data.element).data("count");
        if (count) {
            text += "<sup>" + count + "</sup>";
        }
        return text;
    };
    d["shouldFocusInput"] = function () {
        return false;
    };

    readySelect2(filter.find('.select2_custom'), d);
});
