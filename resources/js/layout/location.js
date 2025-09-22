import "/resources/scss/layout/location.scss";
import "/resources/js/ajax/layout/city.js";

let city_select = $('#city_select select, #burger_city_select select');

$(document).ready(function () {
    let d = window.getDataSelect2();
    d = window.setAjaxDataSelect2(d, window.routes["cities"]);

    readySelect2(city_select, d);
});

city_select.on('change', function() {
    setCity($(this).val());
});
