import "/resources/scss/product/product_result/product_result_processing.scss";

let product_result_processing__actions = $(".product_result_processing__actions");
window.getProductPhone = function()
{
    product_result_processing__actions.find("> *").hide();
    product_result_processing__actions.find(".product_result_processing__actions_phone").show();

}