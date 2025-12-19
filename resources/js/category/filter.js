import "/resources/scss/category/filters.scss";
import '/resources/js/custom/ion-rangeslider/index.js';

import '/resources/js/custom/select2/select2_more.js';
import '/resources/js/custom/dop_menu/index.js';

let filter = $(".filter");
let timer = null;
let ignore_property_id = null;
let is_stop = 0;
let btn_start = $(".filter__actions_btn_start");
let btn_clear = $(".filter__actions_btn_clear");

btn_clear.click(function () {
    window.clearFilters();
});

btn_start.click(function () {
    setTimer();
});

window.clearFilters = function()
{
    filter.find('input, select').each(function () {
        let obj = $(this);

        // if (!obj.attr("name") || !obj.attr("name").startsWith("filter_")) {
        //     return true;
        // }
        //

        if (obj.attr("type") == "radio" && obj.is(':checked') || obj.attr("type") == "checkbox") {
            obj.prop('checked', false);
        }

        if (obj.attr("type") == "text") {
            obj.val("");
        }

        if (obj.is('select')) {
            obj.val(null).trigger('change.select2');
        }

        if (obj.hasClass("ion_rangeslider")) {
            // let range = obj.data("ionRangeSlider").result;
            let min = obj.data("min");
            let max = obj.data("max");
            obj.data("ionRangeSlider").update({
                min: min,
                max: max,
                from: min,
                to: max,
            });
            obj.closest(".ion_rangeslider__body").find("input").val("");
            obj.closest(".ion_rangeslider__body").find('input[name="min"]').attr("placeholder", "От " + min);
            obj.closest(".ion_rangeslider__body").find('input[name="max"]').attr("placeholder", "До " + max);
        }
    });

    setTimer();
}

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
    ignore_property_id = (obj ? obj.closest(".filter__body").data("property-id") : null);
    clearTimeout(timer);
    timer = setTimeout(start, 500);
}

function start() {
    window.getProuctFilter(1);
}

window.updateFilter = function (properties) {
    // console.log(properties);
    filter.removeClass("skeleton");

    let filter_wrappers = filter.find(".filter__body:not(.ion_rangeslider__body)");
    filter_wrappers.each(function(index, filter_wrapper) {
        filter_wrapper = $(filter_wrapper);
        let property_id = filter_wrapper.data("property-id");
        if(property_id == ignore_property_id){return true;}
        // console.log(ignore_property_id);
        // console.log("property_id - "+property_id);
        let info = properties.find(item => item.id === property_id);
        // console.log(info);

        // input
        filter_wrapper.find("input").each(function() {
            let filter_input = $(this);
            if(!info){filter_input.prop('disabled', true); return 1;}
            // console.log(info, filter_input.val());
            let info_value = info["values"].find(item => item.id === parseInt(filter_input.val()));
            // console.log(info_value);
            if(info_value)
            {
                filter_input.prop('disabled', false);
            } else {
                filter_input.prop('disabled', true);
            }
        });

        // select
        filter_wrapper.find("select.select2_custom").each(function() {
            let obj = $(this);

            obj.find('option').each(function () {
                let option = $(this);
                if (option.val() == "") { return true; }

                if(!info)
                {
                    option.data("count", 0).prop('disabled', true);
                    return 1;
                }

                let info_value = info["values"].find(item => item.id === parseInt(option.val()));
                // console.log("option", info_value);
                if(info_value) {
                    option.data("count", info_value["product_count"]).prop('disabled', false);
                } else {
                    option.data("count", 0).prop('disabled', true);
                }
            });

            obj.trigger('change.select2');


            // // console.log(info_value);
            // if(info_value)
            // {
            //     filter_input.prop('disabled', false);
            // } else {
            //     filter_input.prop('disabled', true);
            // }
        });
    });
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
