<?php

namespace App\Http\Controllers\Auth;

use App\Http\Services\Auth\RegistrationServices;
use Illuminate\Http\Request;

class ConfirmController extends IndexController
{
    public function registration(Request $request)
    {
        return (new RegistrationServices)->confirm($request);
    }
}
