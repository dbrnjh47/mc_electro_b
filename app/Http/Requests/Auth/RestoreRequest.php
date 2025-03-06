<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Validator;

class RestoreRequest extends FormRequest
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
        return [
            'email' => 'required|email',
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
            // 'email.required' => 'Пользователь не найден!',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!$validator->errors()->messages())
                {
                    $data = $validator->getData();

                    $user = User::where('email', $data['email'])->whereNotNull("email_verified_at")->first();

                    if(!$user)
                    {
                        $validator->errors()->add('email', 'Пользователь не найден!');
                    }
                    // Добавляем параметры маршрута в данные запроса
                    $this->merge([
                        'user' => $user,
                    ]);
                }
            }
        ];
    }
}
