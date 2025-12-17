import "/resources/scss/category/filters.scss";
import '/resources/js/custom/ion-rangeslider/index.js';

import '/resources/js/custom/select2/select2_more.js';
import '/resources/js/custom/dop_menu/index.js';

let filter = $(".filter");
let timer = null;
let element_ignore = null;
let is_stop = 0;

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


$(document).ready(function () {
    let d = getDataSelect2();
    d["dropdownCssClass"] = "select2_filter";
    d["minimumResultsForSearch"] = 5;
    d["escapeMarkup"] = function (markup) {
        return markup; // Отключаем экранирование HTML
    };
    d["templateResult"] = function (data) {
        let text = data.text;
        data.disabled = true;
        let count = $(data.element).data("count");
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


filter.find('input, select').change(function () {
    let obj = $(this);

    if (obj.attr("name") == "search" || obj.attr("name") == "min" || obj.attr("name") == "max"
    ) {
        return;
    }

    if (!is_stop) {
        setTimer(obj);
    }
});

function setTimer(obj = null) {
    element_ignore = obj;
    clearTimeout(timer);
    timer = setTimeout(start, 500);
}

function start() {
    window.getProuctFilter(1);
}

window.updateFilter = function (data) {
    filter.removeClass("skeleton");
}

window.getFilter = function () {
    let filters = {};

    filter.find('input, select').each(function () {
        let obj = $(this);
        if (!obj.attr("name") || !obj.attr("name").startsWith("filter_")) {
            return true;
        }
        let key = obj.closest(".filter__body").data("property-id");
        if (filters[key] !== undefined) { return 1; }

        let val = null;

        //

        if (obj.attr("type") == "radio" && obj.is(':checked')) {
            val = obj.val();
        }

        if (obj.is('select') && obj.val() != "") {
            val = obj.val();
        }

        if (obj.attr("type") == "checkbox") {
            val = $('.filter__body[data-property-id="' + key + '"] input:checked').map(function () {
                return $(this).val();
            })
                .get()
                .filter(function (value, index, self) {
                    return self.indexOf(value) === index; // Оставляет только первое вхождение
                });
        }

        //

        if (val === ""
            || Array.isArray(val) && !val.length
            || val == null
            || typeof val === 'object' && Object.keys(val).length === 0
        ) {
            return 1;
        }

        if (!Array.isArray(val)) {
            val = new Array(val);
        }

        filters[key] = val;
    });

    delete filters[""];

    return filters;
}

window.getRangFilter = function () {
    let filters = {};

    filter.find('input.ion_rangeslider').each(function () {
        let obj = jQuery(this);
        let range = obj.data("ionRangeSlider").result;
        let key = obj.closest(".filter__body").data("property-id");
        let val = {};

        //

        if (obj.data("min") != range.from && obj.closest(".ion_rangeslider__body").find('input[name="min"]').val() != "") {
            val["min"] = range.from;
        }
        if (obj.data("max") != range.to && obj.closest(".ion_rangeslider__body").find('input[name="max"]').val() != "") {
            val["max"] = range.to;
        }

        if(
            Array.isArray(val) && val.length
            || typeof val === 'object' && Object.keys(val).length != 0
        )
        {
            filters[key] = val;
        }
    });

    return filters;
}
