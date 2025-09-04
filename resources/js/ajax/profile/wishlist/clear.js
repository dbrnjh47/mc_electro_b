window.wishListClear = function() {
    $.ajax({
        url: window.routes["wishlist.clear"],
        type: "POST",
        success: function () {
            location.reload();
        },
        error: function (msg) {

        }
    });
}
