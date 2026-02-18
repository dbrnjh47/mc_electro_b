<?php

namespace App\Http\Requests\Cart;

use App\Models\Product\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateRequest extends FormRequest
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
            "full_name" => ['nullable', 'string', 'max:255'],
            "phone" => ['nullable', 'string', 'max:255'],
            "address" => ['nullable', 'string', 'max:255'],
            "payment_id" => ['nullable', 'integer'],
            "delivery_method_id" => ['nullable', 'integer'],
            "point_id" => ['nullable', 'integer'],
            "products" => ['nullable', 'array'],
            'products.*.id' => ['required', 'integer'],
            'products.*.count' => ['required', 'integer', 'min:1'],
        ];
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
                    if(isset($data["products"]))
                    {
                        $product_ids = array_column($data["products"], 'id');
                        $product_count = Product::whereIn("id", $product_ids)->count();

                        if($product_count != count($product_ids))
                        {
                            $validator->errors()->add('products', 'Товара не существует');
                        }
                    }
                }
            }
        ];
    }
}
