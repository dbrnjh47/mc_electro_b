import "/resources/scss/category/filters.scss";
import '/resources/js/custom/ion-rangeslider/index.js';

import '/resources/js/custom/select2/select2_more.js';
import '/resources/js/custom/dop_menu/index.js';

$(".filter__header").click(function () {
    let filter__item = $(this).closest(".filter__item");
    let filter__body = filter__item.find(".filter__body");

    if(filter__item.hasClass("open"))
    {
        filter__body.slideUp(300);
    } else {
        filter__body.slideDown(300);
    }

    setTimeout(function() {
        if(filter__item.hasClass("open"))
        {
            filter__item.removeClass("open");
        } else {
            filter__item.addClass("open");
        }
    }, 300);
});