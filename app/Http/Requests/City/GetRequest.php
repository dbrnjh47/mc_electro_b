<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
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
            "search" => ['nullable', 'string'],
            "page" => ['integer'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = $this->all();

        // Удаляем конкретные поля если они пустые
        $fieldsToCheck = ['search'];

        foreach ($fieldsToCheck as $field) {
            if (isset($data[$field]) && $data[$field] === '') {
                unset($data[$field]);
            }
        }

        $this->replace($data);
    }
}
