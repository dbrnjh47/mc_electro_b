<?php

namespace App\Http\Controllers;

use App\Http\Services\City\IndexService as CityService;
// use App\Http\Services\Currency\CurrencyService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\Locale\IndexService as LocaleService;

use Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        date_default_timezone_set('Europe/Moscow');

        $settings = Setting::first();
        view()->share('settings', $settings);
        app()->singleton('settings', function ($app) use ($settings) {
            return $settings;
        });

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (Auth::check()) {
                // $this->user = User::where("id", $this->user->id)->firstOrFail();
                view()->share('u', $this->user);
                app()->singleton('user', function ($app) {
                    return $this->user;
                });
            }

            if (app('settings')->teh_works && !$this->user || app('settings')->teh_works && $this->user && $this->user->role != "admin") {
                // abort(404);
                return response()->view('errors.404');
            }

            if ($this->user && $this->user->role != "admin" && $this->user->ban) {
                // abort(404);
                return response()->view('errors.404');
            }

            return $next($request);
        });

        // $user_currency = (new CurrencyService)->get();
        // view()->share('user_currency', $user_currency);
        // app()->singleton('user_currency', function ($app) use ($user_currency) {
        //     return $user_currency;
        // });

        //

        $user_city = (new CityService)->get();
        view()->share('user_city', $user_city);
        app()->singleton('user_city', function ($app) use ($user_city) {
            return $user_city;
        });
    }

    public static function photoAccessor($value, $path)
    {
        return $path . $value;
    }

    public function notFound($text = "")
    {
        throw new NotFoundHttpException($text);
    }
}
