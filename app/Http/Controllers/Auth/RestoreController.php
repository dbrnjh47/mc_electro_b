<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Services\Auth\RestoreServices;

class RestoreController extends IndexController
{
    public function show() {return view('auth.reset.index');}

    public function reset(Request $request)
    {
        return (new RestoreServices)->reset($request->email);
    }

    public function confirmation($user_id, $remember_token)
    {
        $data = ["user_id" => $user_id, "remember_token" => $remember_token];
        (new AuthServices)->resetConfirmation($data);

        return redirect()->route('profile')->with('success', __("controller.success"));
    }

    public function resetConfirmationPhone(Request $request)
    {
        return (new AuthServices)->resetConfirmationPhone($request);
    }

    //

    public function authResetPassword(Request $request)
    {
        return (new RestoreServices)->resetPasswordAuth($request, $this->user);
    }
}
