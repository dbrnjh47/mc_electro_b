<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmService
{
    public function confirm($request)
    {
        // получаю юзера
        $user = User::find($request->user_id);

        $user->email_verified_at = now();
        $user->save();

        Auth::login($user, true);

        return redirect()->route('home');
    }
}
