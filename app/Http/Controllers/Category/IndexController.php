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
        $product_slug = null;
        // dump($category);
        // dump($slugs);
        if(!$category){
            $category = (new CategoryModelService)->firstBySlug(array_slice($slugs, -2, 1)[0]);
            // dump("видимо ссылка товар");
            if(!$category || !$category->is_on){
                // dump("not", $category);
                $this->notFound();
            }
            $product_slug = array_pop($slugs);
        }
        if(!$category->is_on){$this->notFound();}
        // dump($slugs);
        // dump($category);
        $category->parent_slugs = $slugs;
        $category->parents();
        // dump($category->parents_paths);
        if(!in_array(implode('/', $slugs), $category->parents_paths)){$this->notFound();}
        if($product_slug)
        {
            return (new ProductIndexController())->show($category, $product_slug);
        }

        //

        [$path_slugs, $breadcrumbs] = BreadcrumbService::getForCategory($category);

        //

        $category->childrens(1);
        // dump($category->childrens);

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
