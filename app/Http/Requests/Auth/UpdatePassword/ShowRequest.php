<?php

namespace App\Http\Requests\Auth\UpdatePassword;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Http\Services\Auth\UserTokenServices;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
class ShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // Добавляем параметры маршрута в данные запроса
        $this->merge([
            'user_id' => $this->route('user_id'),
            'token' => $this->route('token'),
        ]);
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!$validator->errors()->messages())
                {
                    $data = $validator->getData();

                    $res = (new UserTokenServices("user_auth_reset_"))->first($data['token']);

                    if (!$res || (int) $res != $data['user_id']) {
                        throw new NotFoundHttpException('');
                    }

                }
            }
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'token' => ['required', 'string', 'min:10'],
        ];
    }

    /**
     * Обработка неудачной валидации.
     *
     * @param Validator $validator
     * @throws NotFoundHttpException
     */
    protected function failedValidation(ValidatorContract $validator)
    {
        // Выбрасываем исключение 404 вместо перенаправления с ошибками
        throw new NotFoundHttpException('');
    }
}
