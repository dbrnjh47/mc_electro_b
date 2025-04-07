<?php

namespace App\Http\Controllers;

use App\Http\Services\Currency\CurrencyServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\Locale\IndexServices as LocaleServices;

use Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user, $settings, $user_currency, $user_local;

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

            $this->user_currency = (new CurrencyServices)->get();
            view()->share('user_currency', $this->user_currency);

            //

            $this->user_local = (new LocaleServices)->get();
            view()->share('user_local', $this->user_local);

            return $next($request);
        });
    }

    public static function photoAccessor($value, $path)
    {
        return $path . $value;
    }
}
