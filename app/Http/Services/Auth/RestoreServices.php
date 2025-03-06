<?php

namespace App\Http\Services\Auth;

use Illuminate\Validation\ValidationException;
use App\Http\Services\Auth\UserTokenServices;
use App\Jobs\Auth\ResetUserJob;

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

    // public function update($request)
    // {
    //     $validData = $this->validation(__FUNCTION__, $request->all());

    //     $userToken = (new UserTokenServices)->first($request->user_id, $request->code);

    //     $userToken->user->password = Hash::make($request->password);
    //     if(!$userToken->user->email_verified_at)
    //     {
    //         $userToken->user->email_verified_at = now();
    //     }
    //     $userToken->user->save();

    //     Auth::login($userToken->user, true);

    //     $userToken->delete();

    //     return;
    // }
}
