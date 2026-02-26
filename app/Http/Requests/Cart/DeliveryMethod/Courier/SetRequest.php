<?php

namespace App\Http\Requests\Cart\DeliveryMethod\Courier;

use Illuminate\Foundation\Http\FormRequest;

class SetRequest extends FormRequest
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
            "city" => ['required', 'string', 'max:255'],
            "street" => ['required', 'string', 'max:255'],
            "house" => ['required', 'string', 'max:255'],
            "apartment" => ['nullable', 'string', 'max:255'],
        ];
    }
}
