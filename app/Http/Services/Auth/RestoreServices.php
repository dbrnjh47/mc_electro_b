<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\Auth\RestoreValidations;

use App\Jobs\Auth\ResetPasswordUserEmailJob;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Http\Services\Auth\UserTokenServices;

use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\PasswordResetMail;
use App\Models\Setting;

class RestoreServices extends Validation
{
    public function __construct()
    {
        $this->validation = new RestoreValidations();
    }

    public function reset($email)
    {
        //->whereNotNull("email_verified_at")
        $user = User::where('email', $email)->whereNotNull("email_verified_at")->firstOrFail();

        $user_token = (new UserTokenServices)->create($user->id);

        dispatch(new ResetPasswordUserEmailJob($user, $user_token->code));
        // $settings = Setting::first();
        // Mail::to($user->email)->send(new PasswordResetMail($user, $user_token->code, $settings));

        return;
    }

    public function update($request)
    {
        $validData = $this->validation(__FUNCTION__, $request->all());

        $userToken = (new UserTokenServices)->first($request->user_id, $request->code);

        $userToken->user->password = Hash::make($request->password);
        if(!$userToken->user->email_verified_at)
        {
            $userToken->user->email_verified_at = now();
        }
        $userToken->user->save();

        Auth::login($userToken->user, true);

        $userToken->delete();

        return;
    }

    //

    public function resetPasswordAuth($request, $user)
    {
        $validData = $this->validation(__FUNCTION__, $request);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return;
    }
}
