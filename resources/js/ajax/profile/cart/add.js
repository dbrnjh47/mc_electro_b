window.cartAdd = function(product_id, count = 1, is_add = 1) {
    $.ajax({
        url: window.routes["cart.add"],
        type: "POST",
        data: {
            "product_id": product_id,
            "count": count
        },
        success: function () {
            miniAlert("Товар добавлен в корзину");

            if(is_add || window.cart_count == 0)
            {
                window.cart_count++;
                window.updateCartCountElements();
            }
        },
        error: function (msg) {
            console.log(msg);
            miniAlert(msg.responseJSON.message, "error");
        }
    });
}
