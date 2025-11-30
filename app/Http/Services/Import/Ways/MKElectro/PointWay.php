<?php

namespace App\Http\Services\Import\Ways\MKElectro;

use App\Http\API\MKElectroApi;
use App\Http\Services\MediaService;
use App\Http\Services\Models\CityModelService;
use App\Models\Point\Link\PointLink;
use App\Models\Point\Link\PointLinkCategory;
use App\Models\Point\Point;
use App\Models\Point\PointPhone;
use App\Models\Point\PointPhoto;
use Illuminate\Support\Facades\Storage;

class PointWay extends MKElectroApi
{
    public function start()
    {
        dump("Создание точек МКЭлектро");

        $points = $this->getPoints();

        foreach ($points as $point) {
            $p = new Point();
            $p->title = $point["title"];
            $p->email = ($point["email"] ?? null);
            $p->lon = $point["lon"];
            $p->lat = $point["lat"];
            $p->yandex_widget_href = null;
            $p->is_on = $point["is_on"];
            $p->address = $point["address"];
            $p->yandex_widget_href = $point["comment"];
            $p->yandex_widget_href =  ($point["yandex_widget_href"] ?? null);
            $p->description = null;
            $p->city_id = (new CityModelService(["id"]))->first($point["city"])->id;
            $p->save();

            if (isset($point["phones"])) {
                foreach ($point["phones"] as $phone) {
                    $p_phone = new PointPhone();
                    $p_phone->phone = $phone;
                    $p_phone->point_id = $p->id;
                    $p_phone->save();
                }
            }

            if (isset($point["links"]["map"])) {
                foreach ($point["links"]["map"] as $type => $link) {
                    $point_link_category_id = null;
                    $point_link_category_id = PointLinkCategory::where("title", $type)->first();

                    if ($point_link_category_id) {
                        $point_link_category_id = $point_link_category_id->id;
                        $p_phone = new PointLink();
                        $p_phone->url = $link;
                        $p_phone->point_link_category_id = $point_link_category_id;
                        $p_phone->point_id = $p->id;
                        $p_phone->save();
                    }
                }
            }

            if (isset($point["photos"])) {
                foreach ($point["photos"] as $name => $d) {
                    // создание файла
                    $path = PointPhoto::PATH . $name;

                    $name = (new MediaService)->createImgBase64($path, $d);

                    if ($name) {
                        $p_photo = new PointPhoto();
                        $p_photo->img = basename($name);
                        $p_photo->point_id = $p->id;
                        $p_photo->save();
                    }
                }
            }
        }
        return;
    }
}
