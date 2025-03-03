<?php

namespace App\Http\Services\Auth;


use App\Jobs\Auth\RegistrationUserEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\RegistrationMail;
use App\Models\Setting;

class RegistrationServices
{
    public function registration($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        $token = (new UserTokenServices)->create($user->id);

        // Auth::login($user, true);
        dispatch(new RegistrationUserEmailJob($user, $request->password, $token));

        return $token;
    }

    // public function confirm($request)
    // {
    //     $user_token = (new UserTokenServices)->first($request->user_id, $request->token);

    //     $user_token->user->email_verified_at = now();
    //     $user_token->user->save();

    //     Auth::login($user_token->user, true);

    //     $user_token->delete();

    //     return redirect()->route('profile');
    // }

    // public function repeatEmailSend($request)
    // {
    //     $validData = $this->validation(__FUNCTION__, $request->all());

    //     $user_token = (new UserTokenServices)->find($request->id);
    //     $settings = Setting::first();

    //     Mail::to($user_token->user->email)->send(new RegistrationMail($user_token->user, null, $user_token->code, $settings));

    //     return;
    // }
}
