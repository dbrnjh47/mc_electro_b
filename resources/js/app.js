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
    if (msg && msg.responseJSON && msg.responseJSON.errors) {
        var errors = msg.responseJSON.errors;
        console.log('Ошибки валидации:', errors);

        // Обрабатываем каждую ошибку
        $.each(errors, function(key, messages) {
            // Находим все поля с этим именем
            var $fields = wrapper.find('[name="' + key + '"], [name="' + key + '[]"], [name$="[' + key + ']"]');

            if ($fields.length) {
                $fields.each(function() {
                    var $field = $(this);
                    var $wrapper = $field.closest('.invalid_feedback_wrapper');

                    if ($wrapper.length) {
                        $wrapper.addClass('is_invalid');

                        // Добавляем все сообщения об ошибках для этого поля
                        messages.forEach(function(errorMessage) {
                            $wrapper.append(`
                                <div class="invalid_feedback">${errorMessage}</div>
                            `);
                        });
                    }
                });
            } else {
                // Если поле не найдено, показываем общую ошибку
                // showGeneralError(key + ': ' + messages.join(', '));
                miniAlert("Неизвестная ошибка", "error");
            }
        });
    } else {
        // Обработка невалидационных ошибок
        miniAlert("Серверная ошибка", "error");
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
