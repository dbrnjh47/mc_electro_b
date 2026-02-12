window.cartDelete = function(product_id) {
    $.ajax({
        url: window.routes["cart.delete"]+"/"+product_id,
        type: "DELETE",
        success: function () {
            miniAlert("Товар удалён из корзины");
            window.cart_count--;
            window.updateCartCountElements();
        },
        error: function (msg) {

        }
    });
}
