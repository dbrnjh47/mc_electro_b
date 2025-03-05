var wrapper = $("#modal_reset"),
    button = $("#modal_reset_btnt");

button.click(function (e) {
    let data = getInfo(wrapper);
    window.validationDistroy(wrapper, button);

    $.ajax({
        url: window.routes["restore.reset"],
        type: "POST",
        data: data,
        success: function () {
            $("#feedback_modal").html(html);
            modal('#feedback_modal .modal');
        },
        error: function (msg) {
            window.validationForm(msg, wrapper, button);
        }
    });
});
