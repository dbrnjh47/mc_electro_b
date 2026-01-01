<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class FilterRequest extends FormRequest
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
            "page" => ['nullable', 'integer', 'min:1'],
            "search" => ['nullable', 'string', 'min:1', 'max:128'],

            "category_slug" => ['nullable', 'string', 'max:128'],
            "category_id" => ['nullable', 'integer'],
            "path_id" => ['nullable', 'integer'],
            // "category_ids" => ['nullable', 'array', 'min:1'],
            // "category_ids.*" => ['required', 'integer'],

            "filters" => ['nullable', 'array', 'min:1'],
            "filters.*" => ['required', 'array', 'min:1'],
            "filters.*.*" => ['required', 'integer', 'min:1'],

            "rang_filters" => ['nullable', 'array', 'min:1'],
            "rang_filters.*" => ['required', 'array', 'min:1'],
            "rang_filters.*.*" => ['required', 'numeric', 'min:1'],

            "sort" => ['required', 'string', 'in:name_asc,create_desc,create_asc,price_desc,price_asc'],
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
