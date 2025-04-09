let button = $("#modal_login_btn, #block_login_btn");

button.click(function (e) {
    let wrapper = $(this).closest("#modal_login");
    if(!wrapper.length){wrapper = $(this).closest("#block_login");}
    console.log(wrapper);
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
