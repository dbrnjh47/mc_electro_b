import "/resources/js/ajax/cart/delivery_method.js";

window.delivery_select = $('#cart_shipping_method');
window.delivery_info = $('#shipping_method_info');


window.delivery_select.on('select2:select', function(e) {
    // Отменяем изменение (возвращаем старое значение)

    let new_delivery_method_id = $(this).val();
    $(this).val($(this).data("delivery-id")).trigger('change');

    window.getDeliveryModal(new_delivery_method_id);
});
