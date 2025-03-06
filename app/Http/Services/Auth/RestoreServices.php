<?php

namespace App\Http\Services\Auth;

use Illuminate\Validation\ValidationException;
use App\Http\Services\Auth\UserTokenServices;
use App\Jobs\Auth\ResetUserJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RestoreServices
{
    public function reset($user)
    {
        $token = (new UserTokenServices("user_auth_reset_"))->create($user->id);

        dispatch(new ResetUserJob($user, $token));

        // $settings = Setting::first();
        // Mail::to($user->email)->send(new PasswordResetMail($user, $user_token->code, $settings));

        return;
    }

    public function update($request)
    {
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        if(!$user->email_verified_at)
        {
            $user->email_verified_at = now();
        }
        $user->save();

        Auth::login($user, true);

        return;
    }
}
