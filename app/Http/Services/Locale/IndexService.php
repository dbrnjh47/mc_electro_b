<?php
// off
namespace App\Http\Services\Locale;

use App\Http\Services\Models\LocaleModelService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexService
{
    public function get()
    {
        return (new LocaleModelService)->firstBySlug((Cookie::get('locale_set') ?? App::getLocale()));
        // $locale = Cookie::get('locale');
    }

    public function set($locale, $off_not_found = 0)
    {
        if(!$locale)
        {
            if(!$off_not_found) throw new NotFoundHttpException('');
            return $this->create($this->get()->slug);
        }
        if(!(new LocaleModelService)->firstBySlug($locale))
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
