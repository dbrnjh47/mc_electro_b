<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UpdatePassword\ShowRequest;
use App\Http\Requests\Auth\UpdatePassword\UpdatePasswordRequest;
use Illuminate\Http\Request;
use App\Http\Services\Auth\RestoreService;
use App\Http\Services\Auth\UserTokenService;

class UpdatePasswordController extends IndexController
{
    public function show(ShowRequest $request)
    {
        $token = $request->token;
        $user_id = $request->user_id;
        return view('sample.main.pages.auth.reset.new_password', compact("token", "user_id"));
    }

    public function update(UpdatePasswordRequest $request)
    {
        return (new RestoreService)->update($request);
    }
}
