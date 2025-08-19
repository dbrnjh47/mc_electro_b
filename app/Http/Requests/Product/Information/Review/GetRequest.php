<?php

namespace App\Http\Requests\Product\Information\Review;

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
            "page" => ['required', 'integer'],
            "product_id" => ['required', 'integer'],
            "sort" => ['required', 'in:created_at_asc,created_at_desc'],
        ];
    }
}
