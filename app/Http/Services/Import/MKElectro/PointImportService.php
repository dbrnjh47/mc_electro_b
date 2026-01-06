<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\MediaService;
use App\Models\City\City;
use App\Models\Point\Link\PointLink;
use App\Models\Point\Link\PointLinkCategory;
use App\Models\Point\Point;
use App\Models\Point\PointPhone;
use App\Models\Point\PointPhoto;
use Illuminate\Support\Facades\DB;

class PointImportService extends MKElectroImportService
{
    public function start()
    {
        $this->write("");
        $this->write("Создание контактов/точек");

        $points = $this->api->getPoints();

        foreach ($points as $point) {
            DB::beginTransaction();
            try {
                if (Point::where('uuid', $point["uuid"])->exists()) {
                    throw new \Exception("{$point["uuid"]} уже существует");
                }

                $p = new Point();
                $p->fill([
                    'uuid' => $point["uuid"],
                    'title' => $point["title"],
                    'email' => ($point["email"] ?? null),
                    'lon' => $point["lon"],
                    'lat' => $point["lat"],
                    'is_on' => $point["is_on"],
                    'address' => $point["address"],
                    'comment' => $point["comment"],
                    'yandex_widget_href' => ($point["yandex_widget_href"] ?? null),
                    'description' => null,
                    'city_id' => City::where("name", $point["city"])->first()->id,
                ]);
                $p->save();

                //

                if (isset($point["phones"])) {
                    foreach ($point["phones"] as $phone) {
                        $p->phones()->create([
                            'phone' => $phone,
                        ]);
                    }
                }

                //

                if (isset($point["links"]["map"])) {
                    foreach ($point["links"]["map"] as $type => $link) {
                        $point_link_category_id = PointLinkCategory::where("title", $type)->first()->id;

                        if($point_link_category_id)
                        {
                            $p->links()->create([
                                'url' => $link,
                                'point_link_category_id' => $point_link_category_id,
                            ]);
                        }
                    }
                }

                //

                if (isset($point["photos"])) {
                    foreach ($point["photos"] as $name => $d) {
                        // создание файла
                        $path = PointPhoto::PATH . $name;
                        $name = (new MediaService)->createImgBase64($path, $d);

                        if ($name) {
                            $p->photos()->create([
                                'img' => basename($name),
                            ]);
                        }
                    }
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error($e->getMessage());
            }
        }
    }
}
