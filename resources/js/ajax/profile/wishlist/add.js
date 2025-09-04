window.wishListAdd = function(product_id) {
    $.ajax({
        url: window.routes["wishlist.add"]+"/"+product_id,
        type: "POST",
        success: function () {
            miniAlert("Товар успешно добавлен в избранное");
        },
        error: function (msg) {

        }
    });
}
