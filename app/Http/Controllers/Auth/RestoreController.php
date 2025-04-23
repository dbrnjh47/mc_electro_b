<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RestoreRequest;
use Illuminate\Http\Request;
use App\Http\Services\Auth\RestoreService;

class RestoreController extends IndexController
{
    public function show() {return view('sample.main.pages.auth.reset.index');}

    public function reset(RestoreRequest $request)
    {
        (new RestoreService)->reset($request->user);
        return view('sample.main.pages.feedback.modal', ['title' => "Отправлено письмо!", 'message' => "Вам отправили письмо с ссылкой для сброса пароля."]);
    }

    // public function confirmation($user_id, $remember_token)
    // {
    //     $data = ["user_id" => $user_id, "remember_token" => $remember_token];
    //     (new AuthServices)->resetConfirmation($data);

    //     return redirect()->route('profile')->with('success', __("controller.success"));
    // }

    // public function resetConfirmationPhone(Request $request)
    // {
    //     return (new AuthServices)->resetConfirmationPhone($request);
    // }

    //

    // public function authResetPassword(Request $request)
    // {
    //     return (new RestoreServices)->resetPasswordAuth($request, $this->user);
    // }
}
