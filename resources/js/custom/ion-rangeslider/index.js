import 'ion-rangeslider/js/ion.rangeSlider.min.js';
import 'ion-rangeslider/css/ion.rangeSlider.min.css';
import './index.scss';

$(".ion_rangeslider").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    step: 0.1,
    from: 0,
    // to: 100000,
    prefix: "",
    hide_min_max: 1,
    hide_from_to: 1,
    onChange: function (data) {
        $(data.input).closest(".ion_rangeslider__body").find('input[name="min"]').val(data.from);
        $(data.input).closest(".ion_rangeslider__body").find('input[name="max"]').val(data.to);
    },
});

$('.ion_rangeslider__body input[name="min"]').on("keyup", function () {
    let number = $(this).val();
    let slider_instance = $(this).closest(".ion_rangeslider__body").find(".ion_rangeslider").data("ionRangeSlider");
    let slider_instance_result = slider_instance.result;

    if (number == "") { number = slider_instance_result.min; }
    slider_instance.update({
        from: number
    });
});

$('.ion_rangeslider__body input[name="max"]').on("keyup", function () {
    let number = $(this).val();
    let slider_instance = $(this).closest(".ion_rangeslider__body").find(".ion_rangeslider").data("ionRangeSlider");
    let slider_instance_result = slider_instance.result;

    if (number == "") { number = slider_instance_result.max; }
    slider_instance.update({
        to: number
    });
});
