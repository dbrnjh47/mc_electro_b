let cart_modal_wrapper = $("#cart_modal_wrapper");

window.getDeliveryModal = function(delivery_method_id)
{
    $.ajax({
        url: window.routes["cart.delivery_method.modal"]+"/"+delivery_method_id,
        type: "GET",
        success: function (html) {
            cart_modal_wrapper.html(html);
            modal('#modal_shipping');
        },
        error: function (msg) {

        }
    });
}
