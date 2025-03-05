<?php

namespace App\Http\Requests\Auth;

use App\Http\Services\Auth\UserTokenServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Validation\Validator;

class ConfirmRequest extends FormRequest
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

    // protected $redirect = '/404';
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

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!$validator->errors()->messages())
                {
                    $data = $validator->getData();

                    $res = (new UserTokenServices)->first($data['token']);

                    if (!$res || (int) $res != $data['user_id']) {
                        throw new NotFoundHttpException('');
                    }

                }
            }
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
