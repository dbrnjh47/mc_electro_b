<?php

namespace App\Http\Requests\Auth;

use App\Rules\Auth\UniqueRole as AuthUniqueRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // composer require giggsey/libphonenumber-for-php
        // https://github.com/giggsey/libphonenumber-for-php
        // use libphonenumber\PhoneNumberUtil;
        //
        // phone - https://github.com/propaganistas/laravel-phone
        return [
            'name' => 'required|string|min:3',
            'phone' => ['required', 'phone', new AuthUniqueRole()],
            'email' => ['required', 'email', new AuthUniqueRole()],
            'password' => 'required|min:8',
            // 'password_confirmation' => 'required|same:password',

            'agreement' => 'required|in:false,true|accepted'
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $validator->getData();
                if (isset($data['name'])) {
                    $words = explode(' ', trim($data['name']));
                    if (count($words) < 2) {
                        $validator->errors()->add('name', 'Требуется полное имя');
                    }
                }
            }
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'agreement.accepted' => 'Для продолжения необходимо согласиться с политикой',
            'password_confirmation.same' => 'Пароли должны совпадать',
        ];
    }
}
