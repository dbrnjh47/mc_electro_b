window.wishListDelete = function(product_id) {
    $.ajax({
        url: window.routes["wishlist.delete"]+"/"+product_id,
        type: "DELETE",
        success: function () {
            miniAlert("Товар успешно удалён из избранного");
        },
        error: function (msg) {

        }
    });
}
