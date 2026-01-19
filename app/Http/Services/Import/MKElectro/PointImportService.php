<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\Media\Base64MediaService;
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

        $mediaService = (new Base64MediaService);
        $mediaService->maxWidth = PointPhoto::MAX_WIDTH;
        $mediaService->maxHeight = PointPhoto::MAX_HEIGHT;

        //

        $points = $this->api->getPoints();

        foreach ($points as $point) {
            DB::beginTransaction();
            try {
                if (!isset($point["uuid"]) || !isset($point["type"])) {
                    throw new \Exception("Не найдена важная информация");
                }
                if (Point::where('uuid', $point["uuid"])->exists()) {
                    throw new \Exception("{$point["uuid"]} уже существует");
                }

                $p = new Point();
                $p->fill([
                    'uuid' => $point["uuid"],
                    'title' => (isset($point["title"]) ? $point["title"] : null),
                    'email' => (isset($point["email"]) ? $point["email"] : null),
                    'lon' => (isset($point["lon"]) ? $point["lon"] : null),
                    'lat' => (isset($point["lat"]) ? $point["lat"] : null),
                    'is_on' => (isset($point["is_on"]) ? $point["is_on"] : 1),
                    'address' => (isset($point["address"]) ? $point["address"] : null),
                    'comment' => (isset($point["comment"]) ? $point["comment"] : null),
                    'is_pickup' => ($point["type"] == "our" ? 1 : 0),
                    'yandex_widget_href' => ($point["yandex_widget_href"] ?? null),
                    'description' => (isset($point["description"]) ? $point["description"] : null),
                    'city_id' => (isset($point["city"]) ?
                        City::where("name", operator: $point["city"])->first()->id
                        : null),
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
                        $name = $mediaService->create(PointPhoto::PATH, $d);

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
