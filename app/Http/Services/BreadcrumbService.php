<?php

namespace App\Http\Services;

class BreadcrumbService
{
    public $breadcrumbs = [];

    public function add($text, $href = null, $move_to_start = 0)
    {
        $this->breadcrumbs[] = [
            "href" => $href,
            "text" => $text,
        ];
        if($move_to_start == 1)
        {
            $last_element = array_pop( $this->breadcrumbs);
            array_unshift($this->breadcrumbs, $last_element);
        }
    }

    public function get()
    {
        return $this->breadcrumbs;
    }

    public static function getForCategory($category = null) {
        $path_slugs = [];

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Каталог", route("categories"));
        if(!$category){return [$path_slugs, $breadcrumbs];}

        //

        foreach($category->parent_list as $parent_category){
            $path_slugs[] = $parent_category->slug;
            $breadcrumbs->add($parent_category->name, route("category", ["slugs" => implode('/', $path_slugs)]));
        }
        $path_slugs[] = $category->slug;
        $breadcrumbs->add($category->name, route("category", ["slugs" => implode('/', $path_slugs)]));

        return [$path_slugs, $breadcrumbs];
    }
}
