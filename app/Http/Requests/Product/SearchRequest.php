<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class SearchRequest extends FormRequest
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
            "search" => ['required', 'string', 'min:2', 'max:128'],
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
