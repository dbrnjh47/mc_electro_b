<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\Media\Base64MediaService;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;

class CategoryImportService extends MKElectroImportService
{
    public function start()
    {
        $this->write("");
        $this->write("Создание категорий");

        $mediaService = (new Base64MediaService);
        $mediaService->maxWidth = Category::MAX_WIDTH;
        $mediaService->maxHeight = Category::MAX_HEIGHT;

        //

        $categories = $this->api->getCategories();

        foreach ($categories as $category) {
            DB::beginTransaction();
            try {
                if (!$category["category_name"] || !$category["slug"]) {
                    throw new \Exception("Не найдены важные данные");
                }
                if (Category::where('slug', $category["slug"])->exists()) {
                    throw new \Exception("{$category["slug"]} уже существует");
                }

                $c = new Category();
                $c->fill([
                    'name' => $category["category_name"],
                    'slug' => $category["slug"],
                    'is_on' => $category["published"],
                    'description' => (isset($category["category_description"]) && $category["category_description"] != "" ? strip_tags(str_replace(['&#13;&#10;', '&#13;', '&#10;'], '', $category["category_description"])) : null),
                    'ordering' => $category["ordering"],
                ]);
                $c->save();

                if (isset($category["file_name"]) || isset($category["file"])) {
                    $name = $mediaService->create(Category::PATH, $category["file"]);
                    if ($name) {
                        $c->preview = $name;
                        $c->save();
                    }
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error($e->getMessage());
            }
        }

        // установка category_parent_id
        $this->success("Процесс установки родительских категорий");
        foreach ($categories as $category) {
            if (!$category["slug"] || !$category["parent_slug"]) {
                continue;
            }

            DB::beginTransaction();
            try {
                $c = Category::where('slug', $category["slug"])->first();
                if (!$c) {
                    throw new \Exception("{$category["slug"]} не существует");
                }

                $c_parent = Category::where('slug', $category["parent_slug"])->first();
                if (!$c_parent) {
                    throw new \Exception("Для {$category["slug"]} не нашёл родительскую категорию {$category["parent_slug"]}");
                }

                $c->category_parent_id = $c_parent->id;
                $c->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error($e->getMessage());
            }
        }
    }
}
