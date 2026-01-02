<?php

namespace App\Http\Requests\City;

use App\Http\Standards\CityStandard;
use App\Models\City\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!$validator->errors()->messages())
                {
                    $data = $validator->getData();

                    $cityStandard = app()->make(CityStandard::class, [
                        'params' => [
                            "is_on" => 1,
                        ],
                    ]);

                    $city = City::standard($cityStandard)
                        ->select(["id"])
                        ->find($data["id"]);

                    if (!$city) {
                        $validator->errors()->add('id', 'Город не найден');
                    }
                }
            }
        ];
    }

    public function rules(): array
    {
        return [
            "id" => ['required', 'integer'],
        ];
    }
}
