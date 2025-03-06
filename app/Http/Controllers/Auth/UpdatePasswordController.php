<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ShowUpdatePasswordRequest;
use Illuminate\Http\Request;
use App\Http\Services\Auth\RestoreServices;
use App\Http\Services\Auth\UserTokenServices;

class UpdatePasswordController extends IndexController
{
    public function show(ShowUpdatePasswordRequest $request)
    {
        $token = $request->token;
        $user_id = $request->user_id;
        return view('sample.main.pages.auth.reset.new_password', compact("token", "user_id"));
    }

    // public function update(Request $request)
    // {
    //     (new RestoreServices)->update($request);
    //     return;
    // }
}
