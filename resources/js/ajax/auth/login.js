var wrapper = $("#modal_login"),
    button = $("#modal_login_btn");

button.click(function (e) {
    let data = getInfo(wrapper);

    wrapper.find('*').removeClass('is-invalid');
    wrapper.find('.invalid-feedback').remove();

    button.addClass("disable");

    $.ajax({
        url: routes["registration"],
        type: "POST",
        data: data,
        success: function (data) {
            document.location.href = routes["profile"];
        },
        error: function (msg) {
            button.removeClass("disable");
            var errors = msg.responseJSON;
            errors = errors["errors"];
            console.log(errors);

            for (var key in errors) {
                for (var error in errors[key]) {
                    wrapper.find('input[name="' + key + '"], select[name="' + key + '"]')
                        .addClass('is-invalid');
                    wrapper.find('input[name="' + key + '"], select[name="' + key + '"]')
                        .closest('.invalid-feedback-wrapper').append(`
                                <div class="invalid-feedback">` + errors[key][error] + `</div>
                            `);
                }
            }
        }
    });
});
