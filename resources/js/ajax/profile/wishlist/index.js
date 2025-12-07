import "./delete.js";
import "./add.js";

window.setWishlistEvent = function(obj = ".wishlist_action")
{
    $(obj).click(function (e) {
        let obj = $(this);
        let status = obj.attr("data-active");
        console.log(status);
        if(status == "1")
        {
            wishListDelete(obj.data("product-id"));
            obj.attr("data-active", 0).find("span").text("В избранное");
        } else {
            wishListAdd(obj.data("product-id"));
            obj.attr("data-active", 1).find("span").text("В избранном");
        }
    });
}

window.setWishlistEvent();
