<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Services\Auth\AuthServices;

class AuthController extends IndexController
{
    // public function show() {return view('auth.login');}

    public function auth(AuthRequest $request)
    {
        return (new AuthServices)->login($request);
    }
}
