<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Http\Request;
use App\Http\Services\Auth\RegistrationService;

class RegistrationController extends IndexController
{
    // public function show() {return view('auth.registration');}

    public function registration(RegistrationRequest $request)
    {
        $user_token_id = (new RegistrationService)->registration($request);
        return view('sample.main.pages.feedback.modal', ['title' => "Осталось совсем чуть-чуть!", 'message' => "Благодарим вас за регистрацию! Вам отправили письмо для активации аккаунта."]);
    }

    // public function repeatEmailSend(Request $request)
    // {
    //     return (new RegistrationServices)->repeatEmailSend($request);
    // }
}
