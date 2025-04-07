<?php

namespace App\Http\Services\Locale;

use App\Http\Services\Models\LocaleModelServices;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexServices
{
    public function get()
    {
        return Cookie::get('locale_set') ?? App::getLocale();
        // $locale = Cookie::get('locale');
    }

    public function set($locale, $off_not_found = 0)
    {
        if(!$locale)
        {
            if(!$off_not_found) throw new NotFoundHttpException('');
            return $this->create($this->get());
        }
        if(!(new LocaleModelServices)->firstBySlug($locale))
        {
            throw new NotFoundHttpException('');
        }

        return $this->create($locale);
    }

    public function create($locale)
    {
        if(preg_match('/^[a-zA-Z]{2}$/', $locale))
        {
            App::setLocale($locale);

            setcookie("locale_set", $locale, time()+(525600*60 * 24 * 7), "/", $_SERVER['HTTP_HOST']);
            // Cookie::queue('locale_set', $locale, (60 * 24 * 7));

        }

        return $locale;
    }
}
