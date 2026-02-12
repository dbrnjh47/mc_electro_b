import "./delete.js";
import "./add.js";

let cart_count_elements = $(".cart_count");

window.setCartEvent = function(obj = ".cart_action")
{
    $(obj).click(function (e) {
        let obj = $(this);
        let status = obj.attr("data-active");
        console.log(status);
        if(status == "1")
        {
            cartDelete(obj.data("product-id"));
            obj.attr("data-active", 0).text("Добавить в корзину");
        } else {
            cartAdd(obj.data("product-id"));
            obj.attr("data-active", 1).text("Удалить из корзины");
        }
    });
}

window.updateCartCountElements = function()
{
    if(window.cart_count)
    {
        cart_count_elements.text(window.cart_count).show();
    } else {
        cart_count_elements.hide();
    }
}

window.setCartEvent();
