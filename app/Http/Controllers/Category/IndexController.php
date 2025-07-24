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
    public function getBreadcrumbs()
    {
        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Каталог", route("categories"));

        return $breadcrumbs;
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

        $breadcrumbs = $this->getBreadcrumbs();

        return view('sample.main.pages.category.all.index', [
            'title' => "Каталог",
            'description' => "",
            'breadcrumbs' => $breadcrumbs,
            'categories' => $categories
        ]);
    }

    public function getBreadcrumbsShow($category)
    {
        $breadcrumbs = $this->getBreadcrumbs();

        $path_slugs = [];

        foreach($category->parent_list as $parent_category){
            $path_slugs[] = $parent_category->slug;
            $breadcrumbs->add($parent_category->locale->name, route("category", ["slugs" => implode('/', $path_slugs)]));
        }
        $path_slugs[] = $category->slug;
        $breadcrumbs->add($category->locale->name, route("category", ["slugs" => implode('/', $path_slugs)]));

        return [$path_slugs, $breadcrumbs];
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

        [$path_slugs, $breadcrumbs] = $this->getBreadcrumbsShow($category);

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
