let wrapper = $(".cart_block_payment_list__wrapper");
let payment_inputs = null;

window.showPayments = function () {
    let transform_delivery_payments = window.delivery_methods[window.cart["delivery_method_id"]]["transform_delivery_payments"];
    let payments_ids = (0 && window.cart ? transform_delivery_payments["legal"] : transform_delivery_payments["individual"]);


    let html = "";
    payments_ids.forEach(payments_id => {
        let payment = window.payments[payments_id];
        html += `<div class="cart_block_payment_list__item ` + (window.cart['payment_id'] == payments_id ? "activ" : "") + `">
            <input type="checkbox" value="`+ payment["id"] + `" id="payment_id_` + payment["id"] + `" ` + (window.cart['payment_id'] == payments_id ? "checked" : "") + `>
            <label for="payment_id_`+ payment["id"] + `" class="cart_block_payment_list__item_content">
                <div>
                    <h6>`+ payment["title"] + `</h6>
                    <p>`+ (payment["description"] ? payment["description"] : "") + `</p>
                </div>
                `+ (payment["img_url"] ? `
                <div class="cart_block_payment_list__item_photo">
                    <img src="`+ payment["img_url"] + `" alt="` + payment["title"] + `">
                </div>
                ` : "") + `
            </label>
        </div>`;

    });
    wrapper.find(".cart_block_payment_list").html(html);
    wrapper.slideDown();
    window.setPaymentEvent();
}

window.hidePayment = function () {
    wrapper.hide();
}

window.setPaymentEvent = function () {
    payment_inputs = wrapper.find("input");

    payment_inputs.on('change', function () {
        let obj = $(this);

        payment_inputs.prop("checked", false).closest(".cart_block_payment_list__item").removeClass("activ");
        obj.prop("checked", true).closest(".cart_block_payment_list__item").addClass("activ");

        //
        window.cart["payment_id"] = obj.val();
        window.updateCart();
    });
}

window.setPaymentEvent();
