<?php

namespace App\Http\Controllers\Auth;

use App\Http\Services\SocialServices;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends IndexController
{
    // public function __construct()
    // {
    //     IndexController::__construct();
    //     $this->middleware(function ($request, $next) {
    //         if($request->driver != 'google' && $request->driver != 'facebook'){abort(404);}
    //         return $next($request);
    //     });
    // }

    // public function redirect($driver = null)
    // {
    //     return Socialite::driver($driver)->redirect();
    // }

    // public function callback($driver = null)
    // {
    //     (new SocialServices)->create($driver);
    //     return redirect()->route('home');
    // }
}
