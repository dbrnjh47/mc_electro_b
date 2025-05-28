import "/resources/js/landing/categories.js";

let btn = $(".categories__btn .btn");
let list = $(".categories__lists");
btn.click(function () {
    list.css("max-height", "none");
    btn.fadeOut();
});
