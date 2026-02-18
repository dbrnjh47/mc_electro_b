import '/resources/js/custom/loader/index.js';
import '/resources/js/custom/loader/modal_loding.js';
//

window.getInfo = function ($wrapper)
{
    var $data = {};
    $wrapper.find('input, textarea, select').each(function () {
        $data[this.name] = $(this).val();

        if ($(this).attr("type") == "checkbox") {
            $data[this.name] = $(this).is(':checked');
        }
    });

    delete $data[""];
    console.log($data);
    return $data;
}

//

window.validationDistroy = function(wrapper, button = null)
{
    wrapper.find('*').removeClass('is_invalid');
    wrapper.find('.invalid_feedback').remove();

    if(button)
    {
        button.addClass("disabled");
    }
}

window.validationForm = function (msg, wrapper, button = null)
{
    if(button)
    {
        button.removeClass("disabled");
    }

    //
    var errors = msg.responseJSON;
            errors = errors["errors"];
            console.log(errors);

    //

    for (var key in errors) {
        for (var error in errors[key]) {
            wrapper.find('input[name="' + key + '"], select[name="' + key + '"]')
                .closest('.invalid_feedback_wrapper').addClass('is_invalid');
            wrapper.find('input[name="' + key + '"], select[name="' + key + '"]')
                .closest('.invalid_feedback_wrapper').append(`
                        <div class="invalid_feedback">` + errors[key][error] + `</div>
                    `);
        }
    }
}

window.setURL = function(data, convert_json = 0)
{
    console.log("setURL");
    let url = window.location.href;
    url = new URL(url);

    let params = null;
    if(convert_json)
    {
        params = new URLSearchParams({"json": JSON.stringify(data)});
    } else {
        params = new URLSearchParams(data);
    }

    let new_url = url.origin + url.pathname + '?' + params.toString() + url.hash;

    window.history.pushState({}, '', new_url);
}

//
