<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthServices
{

    public function login($request)
    {
        if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], 1)) {
            $request->session()->regenerate();

            return;
        }

        throw ValidationException::withMessages([
            'email' => ['Неправильный пароль или адрес электронной почты!'],
        ]);
    }
}
