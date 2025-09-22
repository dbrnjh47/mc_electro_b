window.setСurrency = function (currency_id) {
    $.ajax({
        url: window.routes["currency.set"]+"/"+currency_id,
        type: "GET",
        success: function () {
            location.reload();
        },
        error: function (msg) {
        }
    });
}
