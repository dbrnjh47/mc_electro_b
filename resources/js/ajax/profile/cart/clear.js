window.cartClear = function() {
    $.ajax({
        url: window.routes["cart.clear"],
        type: "POST",
        success: function () {
            // window.cart_count = 0;
            // window.updateCartCountElements();
            location.reload();
        },
        error: function (msg) {

        }
    });
}
