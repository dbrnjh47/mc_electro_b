<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\IndexController as ProductIndexController;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function list()
    {
        $categories = (new CategoryModelService(["id", "name", "slug"]))
            ->model
            ->with(['relation_childrens' => function ($query) {
                $query->whereHas('category', function ($q) {
                    $q = CategoryModelService::whereOn($q);
                })->with('category', function ($q) {
                    $q = (new CategoryModelService(["id", "name", "slug"], $q));
                }); // Дополнительно подгружаем категорию, если нужно
            }])
            ->doesntHave('relation_parent')
            ->get();

        return $categories;
    }
    public function all()
    {
        $category_service = (new CategoryModelService);
        $categories = $category_service
            ->model
            ->with(['relation_childrens' => function ($query) {
                $query->whereHas('category', function ($q) {
                    $q = CategoryModelService::whereOn($q);
                })->with('category'); // Дополнительно подгружаем категорию, если нужно
            }])
            ->doesntHave('relation_parent');
        $category_service->model = $categories;
        $categories = $category_service->pagination();
        // dd($categories);
        //

        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory();

        return view('sample.main.pages.category.all.index', [
            'title' => "Каталог",
            'description' => "",
            'breadcrumbs' => $breadcrumbs,
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $slugs = explode('/', $request->slugs);
        $category = (new CategoryModelService)->firstBySlug(end($slugs));

        if(!$category || !$category->is_on){
            $this->notFound();
        }

        $category->parent_slugs = $slugs;
        $category->parents();
        // dump($category->parents_paths);
        if(!in_array(implode('/', $slugs), $category->parents_paths)){$this->notFound();}

        //

        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory($category);

        //

        $category->childrens(1);
        $category->childrens(only_ids:1);

        // фильтры


        return view('sample.main.pages.category.first.index', [
            'title' => $category->name,
            'description' => "",
            "breadcrumbs" => $breadcrumbs,
            "category" => $category,
            "path_slugs" => $path_slugs
        ]);
    }
}
