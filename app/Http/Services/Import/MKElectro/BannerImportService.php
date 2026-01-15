<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\Media\Base64MediaService;
use App\Models\Banner\Banner;
use App\Models\Category\Category;
use App\Models\City\City;
use Illuminate\Support\Facades\DB;

class BannerImportService extends MKElectroImportService
{
    public function start()
    {
        $this->write("");
        $this->write("Создание банеров");


        $mediaService = (new Base64MediaService);
        $mediaService->maxWidth = Banner::MAX_WIDTH;
        $mediaService->maxHeight = Banner::MAX_HEIGHT;

        //

        $banners = $this->api->getBanners();
        // dd($banners);
        foreach ($banners as $banner) {
            DB::beginTransaction();
            try {
                if (!isset($banner["file_name"]) || !isset($banner["file"])) {
                    throw new \Exception("Не найдены важные данные");
                }

                $name = $mediaService->create(Banner::PATH, $banner["file"]);
                if(!$name){continue;}
                $b = new Banner();
                $b->fill([
                    'label' => $banner["label"],
                    'href' => (isset($banner["url"]) ? $banner["url"] : null),
                    'key' => $banner["key"],
                    'img' => $name,
                    'ordering' => $banner["ordering"],
                ]);
                $b->save();

                if (isset($banner["cities"])) {

                    $cities = City::whereIn('name', $banner["cities"])->get();

                    if(!$cities->isEmpty()){
                        $b->cities()->saveMany($cities);
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
