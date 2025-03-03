// import '/resources/js/_jquery';

import '/resources/js/custom/bpopup/index.js';

import "/resources/scss/app.scss";
import "/resources/scss/layout/layout.scss";

import "/resources/js/custom/search/index.js";
import '/resources/js/custom/select2/index.js';
import "./header.js";

import "./burger_menu.js";
import "./menu_categories.js";
import "/resources/js/custom/go_top/index.js";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
        button.addClass("disable");
    }
}

window.validationForm = function (msg, wrapper, button = null)
{
    if(button)
    {
        button.removeClass("disable");
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

//
