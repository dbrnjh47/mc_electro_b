<?php

namespace App\Http\Services\Locale;

use App\Http\Services\Modals\LocaleModalServices;
use Illuminate\Support\Facades\App;
use Cookie;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexServices
{
    public function get()
    {
        return Cookie::get('locale') ?? App::getLocale();;
        // $locale = Cookie::get('locale');
    }

    public function set($locale, $off_not_found = 0)
    {
        if(!$locale)
        {
            if(!$off_not_found) throw new NotFoundHttpException('');
            return $this->create($this->get());
        }
        if(!(new LocaleModalServices)->firstBySlug($locale))
        {
            throw new NotFoundHttpException('');
        }

        return $this->create($locale);
    }

    public function create($locale)
    {
        App::setLocale($locale);

        setcookie("locale", $locale, time()+(525600*60));
        Cookie::queue('locale', $locale, 525600);
        return $locale;
    }
}
