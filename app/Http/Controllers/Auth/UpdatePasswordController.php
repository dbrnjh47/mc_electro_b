<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Services\Auth\RestoreServices;
use App\Http\Services\Auth\UserTokenServices;

class UpdatePasswordController extends IndexController
{
    public function show($user_id, $token)
    {
        $userToken = (new UserTokenServices)->first($user_id, $token);

        return view('auth.reset.new_password', compact("userToken"));
    }

    public function update(Request $request)
    {
        (new RestoreServices)->update($request);
        return;
    }
}
