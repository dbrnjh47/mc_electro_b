window.wishListClear = function() {
    $.ajax({
        url: window.routes["wishlist.clear"],
        type: "POST",
        success: function () {
            // window.wishlist_count = 0;
            // window.updateWishlistCountElements();
            location.reload();
        },
        error: function (msg) {

        }
    });
}
