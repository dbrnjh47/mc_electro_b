<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class SetRequest extends FormRequest
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
            'id' => $this->route('id'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => ['required', 'exists:App\Models\Currency,id'],
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
