<?php

return [
    "required" => "Поле обязательно для заполнения!",
    "email" => "Почта введена не корректно!",
    "phone" => "Номер набран неправильно!",
    'unique' => 'Значение занято!',
    'min' => [
        //'array' => 'The :attribute field must not have more than :max items.',
        //'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'Значение не должно быть меньше :min',
        'string' => 'Минимальное количество символов :min',
    ],
    'max' => [
        //'array' => 'The :attribute field must not have more than :max items.',
        //'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'Значение не должно быть больше :max',
        'string' => 'Максимальное количество символов :max',
    ],
    'exists' => 'Значение не найдено!',
    'date' => 'Дата введена не верно!',
    'confirmed' => 'Подтверждение поля не соответствует.',
    'dimensions' => 'Поле имеет недопустимые размеры изображения.',
    'image' => 'Файл должен быть изображением (mp4,jpg,jpeg,png,bmp,gif,svg,webpp,mov).',
    'mimes' => 'Поле должно быть файлом типа: :values.',
    'in' => 'Элемент не найден',
    'integer' => 'Значение должно быть целым числом',
    'numeric' => 'Значение должно быть числом',
    'date_format' => 'Поле должно соответствовать формату :format.',
    'after' => 'Поле должно содержать дату после :date.',
    'alpha_dash' => 'Поле адреса должно содержать только буквы, цифры, тире и подчеркивания.',
    'not_regex' => 'Неверный формат поля.',
    'lt' => [
        'numeric' => 'Поле должно быть меньше :value.',
    ],
    'after_or_equal' => 'Дата введена не верно',
    'companies_search' => 'По Вашему запросу ничего не найдено',
];
