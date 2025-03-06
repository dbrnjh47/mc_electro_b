var wrapper = $("#modal_reset_new_password"),
    button = $("#modal_reset_new_password_btn");

button.click(function (e) {
    let data = getInfo(wrapper);
    window.validationDistroy(wrapper, button);

    $.ajax({
        url: window.routes["restore.update.password"],
        type: "POST",
        data: data,
        success: function () {
            document.location.href = routes["profile"];
        },
        error: function (msg) {
            window.validationForm(msg, wrapper, button);
        }
    });
});
