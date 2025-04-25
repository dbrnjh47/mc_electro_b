<?php

namespace App\Http\Requests\Auth\UpdatePassword;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Http\Services\Auth\UserTokenService;
class UpdatePasswordRequest extends FormRequest
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
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'token' => ['required', 'string', 'min:10'],
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if(!$validator->errors()->messages())
                {
                    $data = $validator->getData();

                    $res = (new UserTokenService("user_auth_reset_"))->first($data['token']);

                    if (!$res || (int) $res != $data['user_id']) {
                        $validator->errors()->add('password', 'Время токена истекло!');
                    }
                }
            }
        ];
    }
}
