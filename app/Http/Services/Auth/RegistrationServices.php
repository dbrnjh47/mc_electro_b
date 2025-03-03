<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\Auth\RegistrationValidations;

use App\Jobs\Auth\RegistrationUserEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\RegistrationMail;
use App\Models\Setting;

class RegistrationServices extends Validation
{
    public function __construct()
    {
        $this->validation = new RegistrationValidations();
    }

    public function registration($request)
    {
        $data = $request->all();

        $validData = $this->validation(__FUNCTION__, $data);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->login = "User#{$user->id}";
        $user->save();

        //ref

        // Log::debug($request->cookie('ref_code'));
        // if($request->cookie('ref_code'))
        // {
        //     $this->referralContract->create(0, $user->id, $request->cookie('ref_code'));
        // }

        // end ref

        $user_token = (new UserTokenServices)->create($user->id);
        // Auth::login($user, true);
        dispatch(new RegistrationUserEmailJob($user, $request->password, $user_token->code));
        //$settings = Setting::first();
        //Mail::to($user->email)->send(new RegistrationMail($user, $request->password, $user_token->code, $settings));

        return $user_token->id;
    }

    public function confirm($request)
    {
        $user_token = (new UserTokenServices)->first($request->user_id, $request->token);

        $user_token->user->email_verified_at = now();
        $user_token->user->save();

        Auth::login($user_token->user, true);

        $user_token->delete();

        return redirect()->route('profile');
    }

    public function repeatEmailSend($request)
    {
        $validData = $this->validation(__FUNCTION__, $request->all());

        $user_token = (new UserTokenServices)->find($request->id);
        $settings = Setting::first();

        Mail::to($user_token->user->email)->send(new RegistrationMail($user_token->user, null, $user_token->code, $settings));

        return;
    }
}
