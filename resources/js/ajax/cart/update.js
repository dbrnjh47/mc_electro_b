window.updateCart = function() {
    let data = window.cart;
    $.ajax({
        url: window.routes["cart.update"],
        type: "POST",
        data: data,
        success: function (html) {

        },
        error: function (msg) {

        }
    });
}
