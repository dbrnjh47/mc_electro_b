<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\VerificationMail;

use App\Models\User;

class VerificationServices
{
    public function verification($request)
    {
        $user = $request->user();
        if(!$user->email_verified_at)
        {
            Mail::to($user->email)->send(new VerificationMail($user->remember_token));
        }

        return;
    }

    public function verificationMail($remember_token)
    {
        $user = User::where("remember_token", $remember_token)->first();
        if($user)
        {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('home')->with('success', __("services.verification_mail_success"));
        } else
        {
            return redirect()->route('home')->with('error', __("services.verification_mail_error"));
        }
        return;
    }
}
