<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function all()
    {

       $i = Category::find(4);
    //    dd($i->children());
    //    dd($i->parents());

        return view('sample.main.pages.category.all.index', ['title' => "Категории", 'description' => ""]);
    }

    public function show(Request $request)
    {
        $slugs = explode('/', $request->slugs);
        $category = (new CategoryModelService)->firstBySlug(end($slugs));
        if(!$category || !$category->is_on){$this->notFound();}
        $category->parent_slugs = $slugs;
        $category->parents();
        dump($category->parents_paths);
        if(!in_array($request->slugs, $category->parents_paths)){$this->notFound();}
        $category->childrens(1);
        dump($category->childrens);
        //

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Каталог", route("categories"));
        $path_slugs = [];

        foreach($category->parent_list as $parent_category){
            $path_slugs[] = $parent_category->slug;
            $breadcrumbs->add($parent_category->locale->name, route("category", ["slugs" => implode('/', $path_slugs)]));
        }
        $path_slugs[] = $category->slug;
        $breadcrumbs->add($category->locale->name, route("category", ["slugs" => implode('/', $path_slugs)]));

        // dump($request->slugs);
        // dump($category->parents_paths);
        // dump($category->parent_list);
        // dd($category);
        return view('sample.main.pages.category.first.index', [
            'title' => $category->locale->name,
            'description' => "",
            "breadcrumbs" => $breadcrumbs,
            "category" => $category,
            "path_slugs" => $path_slugs
        ]);
    }
}
