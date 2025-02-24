<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Auth;
use App\Models\Setting;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user, $settings;

    public function __construct()
    {
        date_default_timezone_set('Europe/Moscow');

        $this->settings = Setting::first();
        view()->share('settings', $this->settings);

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (Auth::check()) {
                // $this->user = User::where("id", $this->user->id)->firstOrFail();
                view()->share('u', $this->user);
            }

            if ($this->settings->teh_works && !$this->user || $this->settings->teh_works && $this->user && $this->user->role != "admin") {
                // abort(404);
                return response()->view('errors.404');
            }

            if ($this->user && $this->user->role != "admin" && $this->user->ban) {
                // abort(404);
                return response()->view('errors.404');
            }

            return $next($request);
        });
    }
}
