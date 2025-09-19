var button = $("#modal_signup_btn, #block_signup_btn");

button.click(function (e) {
    let wrapper = $(this).closest("#modal_signup");
    if(!wrapper.length){wrapper = $(this).closest("#block_signup");}

    let data = getInfo(wrapper);
    window.validationDistroy(wrapper, button);

    $.ajax({
        url: window.routes["registration"],
        type: "POST",
        data: data,
        success: function (html) {
            // document.location.href = routes["profile"];
            $("#feedback_modal").html(html);
            modal('#feedback_modal .modal');
        },
        error: function (msg) {
            window.validationForm(msg, wrapper, button);
        }
    });
});
