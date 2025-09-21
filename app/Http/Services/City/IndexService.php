<?php
// off
namespace App\Http\Services\City;

use App\Http\Services\Models\CityModelService;
use App\Http\Services\Models\LocaleModelService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Request;
class IndexService
{
    public $key = "city_id", $life_time = (60 * 24 * 7);
    public function get()
    {
        $city_id = Cookie::get($this->key);
        // dd($city_id);
        // dump($city_id);
        if(!$city_id || ($city_id != "all" && !is_numeric($city_id)))
        {
            $city_id = "all";
            // определяем и ставим нужный
            $location = GeoIP::getLocation(request()->ip()); // челябинск "77.222.100.237" request()->ip()

            if($location->city)
            {
                $city = (new CityModelService(["id"]))->first($location->city);
                $city_id = ($city ? $city->id : $city_id);
            }

            $this->setCookie($city_id);
        }

        $city = (!$city_id || $city_id == "all"
            ? null
            : (new CityModelService())->find($city_id)
        );

        return $city;
    }

    // public function set($locale, $off_not_found = 0)
    // {
        // if(!$locale)
        // {
        //     if(!$off_not_found) throw new NotFoundHttpException('');
        //     return $this->create($this->get()->slug);
        // }
        // if(!(new LocaleModelService)->firstBySlug($locale))
        // {
        //     throw new NotFoundHttpException('');
        // }

        // return $this->create($locale);
    // }

    public function setCookie($city_id)
    {
        // setcookie($this->key, $city_id, $this->life_time, "/", $_SERVER['HTTP_HOST']);
        Cookie::queue($this->key, $city_id, $this->life_time);
    }
}
