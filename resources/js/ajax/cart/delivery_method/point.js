let page = 1, wrapper = null, is_stop = 0;

window.pickupSetEvent = function () {
    page = 1;
    wrapper = $(".point_modal");
    // change
    wrapper.find('input[name="point_search"]').on('input', function () {
        page = 1; is_stop = 0;
        getPoint("set");
    });

    wrapper.find('.modal_courier__list').on('scroll', function () {
        let $this = $(this);
        let is_end = Math.round($this[0].scrollHeight - $this.scrollTop()) === Math.round($this.outerHeight());

        if (is_end) {
            page++;
            getPoint("add");
        }
    });
    setPointButton();
}

function getPoint(fun) {
    if (is_stop) { return 0; }

    $.ajax({
        url: window.routes["cart.delivery_method.modal.points"],
        type: "GET",
        data: {
            "search": wrapper.find('input[name="point_search"]').val(),
            "page": page,
        },
        success: function (html) {
            if (html == "") {
                is_stop = 1;
                return 0;
            }

            //

            let obj = wrapper.find('.modal_courier__list');
            switch(fun)
            {
                case "set":
                    obj.html(html);
                    break;
                case "add":
                    obj.append(html);
                    break;
            }
            setPointButton();
        },
        error: function (msg) {

        }
    });
}

function setPointButton()
{
    let list = wrapper.find(".modal_courier__item:not(.activ)");
    list.off('click');
    list.click(function() {
        let obj = $(this);

        window.cart["address"] = obj.find(".modal_courier__item_info_address").text();
        window.cart["point_id"] = obj.data("id");
        window.cart["delivery_method_id"] = window.new_delivery_method;
        window.updateCart();

        $("#shipping_method_info").find("h4").text("Выбранный пункт самовывоза");
        $("#shipping_method_info").find("p").text(window.cart["address"]);
        $("#shipping_method_info").find(".btn").text("Изменить точку");

        window.customerLocation = {
            lat: obj.data("lat"),
            lon: obj.data("lon")
        };
        window.setCenterCartMap();
        window.createOrUpdateCartPlacemark(window.cart["address"]);

        window.setDeliveryMethodSelect();
        window.showPayments();
        window.modalClose();
    });
}
