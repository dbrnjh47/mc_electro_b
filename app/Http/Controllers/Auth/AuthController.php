<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Services\Auth\AuthService;

class AuthController extends IndexController
{
    public function show() {
        return view('sample.main.pages.auth.login');
    }

    public function auth(AuthRequest $request)
    {
        return (new AuthService)->login($request);
    }
}
