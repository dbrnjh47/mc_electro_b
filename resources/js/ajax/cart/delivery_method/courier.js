let wrapper = null;

window.courierSetEvent = function () {
    wrapper = $(".modal_courier");
    window.validationDistroy(wrapper);

    wrapper.find('.btn').click(function () {
        let data = getInfo(wrapper);

        $.ajax({
            url: window.routes["cart.delivery_method.courier.set"],
            type: "POST",
            data: data,
            success: function () {
                window.cart["address"] = `г. ${data["city"]}, ${data["street"]} ${data["house"]}` + (data["apartment"] ? `, кв. ${data["apartment"]}` : '');
                window.cart["delivery_method_id"] = window.new_delivery_method;
                window.updateCart();

                //г. Челябинск, test 43 7кв.

                $("#shipping_method_info").find("h4").text("Выбранный адрес");
                $("#shipping_method_info").find("p").text(window.cart["address"]);
                $("#shipping_method_info").find(".btn").text("Изменить адрес");

                //

                window.validationDistroy(wrapper);
                window.modalClose();


            },
            error: function (msg) {
                window.validationForm(msg, wrapper);
            }
        });
    });
}
