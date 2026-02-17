<?php

namespace App\Http\Requests\Cart\DeliveryMethod;

use Illuminate\Foundation\Http\FormRequest;

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
            'delivery_method_id' => $this->route('delivery_method_id'),
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
            "delivery_method_id" => ['required', 'integer', 'exists:App\Models\Order\DeliveryMethod\DeliveryMethod,id'],
        ];
    }
}
