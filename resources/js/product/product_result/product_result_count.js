import "/resources/scss/product/product_result/product_result_count.scss";

let product_result_count__select = $(".product_result_count__select");
let product_result_count__list = $(".product_result_count__list");

product_result_count__select.click(function () {
    if (product_result_count__list.css("display") == "grid") {
        product_result_count__list.slideUp();
    } else {
        product_result_count__list.slideDown().css("display", "grid");
    }
});