<?php

namespace App\Http\Services\ImportMKElectro\Seeders;

use App\Http\API\MKElectroApi;
use App\Http\Services\MediaService;

use App\Http\Services\Models\CategoryModelService;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends MKElectroApi
{
    public function start()
    {
        $categories = $this->getCategories();
        for($i = 0; $i < count($categories); $i++)
        {
            $category_api = $categories[$i];
            $this->createCategory($category_api);
        }
        // dd($categories);
        unset($categories);
        $categories_sub_list = $this->getCategorySub();
        for($i = 0; $i < count($categories_sub_list); $i++)
        {
            $category_sub_api = $categories_sub_list[$i];
            $this->createCategorySub($category_sub_api);
        }
        // dd($categories_sub_list);
        return;
    }

    public function createCategorySub($category_sub_api)
    {
        if(!$category_sub_api["slug_parent"] || !$category_sub_api["slug_child"]){return;}
        dump($category_sub_api);

        $category_sub = new Subcategory();

        $category_sub->category_parent_id = (new CategoryModelService(select_list:["id"], on_check: 0))->firstBySlug($category_sub_api["slug_parent"])->id;
        $category_sub->category_child_id = (new CategoryModelService(select_list:["id"], on_check: 0))->firstBySlug($category_sub_api["slug_child"])->id;

        $category_sub->save();
    }

    public function createCategory($category_api)
    {
        dump($category_api);
        if(!$category_api["category_name"] || !$category_api["slug"]){return;}
        $category = new Category();

        $category->name = $category_api["category_name"];
        $category->slug = $category_api["slug"];
        $category->is_on = $category_api["published"];
        $category->description = (isset($category_api["category_description"]) && $category_api["category_description"] != "" ? strip_tags(str_replace(['&#13;&#10;', '&#13;', '&#10;'], '', $category_api["category_description"])) : null);

        $category->save();
    }
}
