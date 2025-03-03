<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Services\Auth\RegistrationServices;

class RegistrationController extends IndexController
{
    public function show() {return view('auth.registration');}

    public function registration(Request $request)
    {
        return (new RegistrationServices)->registration($request);
    }

    public function repeatEmailSend(Request $request)
    {
        return (new RegistrationServices)->repeatEmailSend($request);
    }
}
