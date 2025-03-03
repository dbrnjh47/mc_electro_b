var wrapper = $("#modal_login"),
    button = $("#modal_login_btn");

button.click(function (e) {
    let data = getInfo(wrapper);
    window.validationDistroy(wrapper, button);

    $.ajax({
        url: window.routes["auth"],
        type: "POST",
        data: data,
        success: function (data) {
            document.location.href = routes["profile"];
        },
        error: function (msg) {
            window.validationForm(msg, wrapper, button);
        }
    });
});
