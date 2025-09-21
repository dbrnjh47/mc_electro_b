let location_info_wrapper = $("#location_info_wrapper");

location_info_wrapper.find(".btn").click(function () {
    location_info_wrapper.remove();
    $.ajax({
        url: window.routes["cookie.city"],
        type: "POST",
        success: function () {

        },
        error: function (msg) {
        }
    });
});


window.setCity = function (city_id) {
    $.ajax({
        url: window.routes["city.set"]+"/"+city_id,
        type: "POST",
        success: function () {
            location.reload();
        },
        error: function (msg) {
        }
    });
}
