let cart_modal_wrapper = $("#cart_modal_wrapper");

window.getDeliveryModal = function (delivery_method_id) {
    window.new_delivery_method = delivery_method_id;
    modal('#modal_loding');
    $.ajax({
        url: window.routes["cart.delivery_method.modal"] + "/" + delivery_method_id,
        type: "GET",
        success: function (html) {
            cart_modal_wrapper.html(html);
            modal('#modal_shipping');
            switch (window.delivery_methods[delivery_method_id]["slug"]) {
                case "pickup":
                    window.pickupSetEvent();
                    break;
                case "courier":
                    window.courierSetEvent();
                    break;
            }
        },
        error: function (msg) {

        }
    });
}
