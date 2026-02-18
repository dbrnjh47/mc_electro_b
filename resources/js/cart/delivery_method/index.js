import "/resources/js/ajax/cart/delivery_method/index.js";
import "/resources/js/ajax/cart/delivery_method/point.js";

window.delivery_select = $('#cart_shipping_method');
window.delivery_info = $('#shipping_method_info');
window.new_delivery_method = null;

window.delivery_select.on('select2:select', function(e) {
    // Отменяем изменение (возвращаем старое значение)

    let new_delivery_method_id = $(this).val();
    $(this).val($(this).data("delivery-id")).trigger('change');

    window.getDeliveryModal(new_delivery_method_id);
});

window.setDeliveryMethodSelect = function()
{
    window.delivery_select.val(window.new_delivery_method).trigger('change');
}

window.delivery_info.find(".btn").click(function () {
    window.getDeliveryModal(window.cart["delivery_method_id"]);
});
