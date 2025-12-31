<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Product\IndexController as ProductIndexController;
use App\Http\Requests\Category\FilterRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CategoryModelService;
use App\Http\Standards\CategoryStandard;
use App\Models\Category\Category;
use App\Models\Category\CategoryPath;
use App\Models\Category\Subcategory;
use App\Models\Property\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public static function breadcrumb($path = null)
    {
        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Каталог", route("categories"));

        if($path)
        {
            $category_ids = explode(',', $path->category_ids);
            $categories = Category::select(["id", "name", "slug"])->whereIn("id", $category_ids)->get()->keyBy('id');

            $slugs = [];
            foreach($category_ids as $category_id)
            {
                $slugs[] = $categories[$category_id]->slug;
                $breadcrumbs->add(
                    $categories[$category_id]->name,
                    route("category", ["slugs" => implode('/', $slugs)])
                );
            }
        }

        return $breadcrumbs;
    }
    public function list()
    {
        $categoryStandard = app()->make(CategoryStandard::class, [
            'params' => [
                "is_on" => 1,
                "product_count" => 1,
            ],
        ]);

        $categories = Category::select(["id", "name", "slug", "category_parent_id"])
            ->standard($categoryStandard)
            ->whereNull("category_parent_id")
            ->with(['child_categories' => function ($q) use ($categoryStandard){
                $q->select(["id", "name", "slug", "category_parent_id"])
                    ->standard($categoryStandard);
            }])
            ->get();

        return $categories;
    }
    public function all()
    {
        $categoryStandard = app()->make(CategoryStandard::class, [
            'params' => [
                "is_on" => 1,
                "product_count" => 1,
            ],
        ]);

        $categories = Category::select(["id", "name", "slug", "category_parent_id"])
            ->standard($categoryStandard)
            ->whereNull("category_parent_id")
            ->with(['child_categories' => function ($q) use ($categoryStandard){
                $q->select(["id", "name", "slug", "category_parent_id"])
                    ->standard($categoryStandard);
            }])
            ->paginate(9);

        //

        $breadcrumbs = self::breadcrumb();

        return view('sample.main.pages.category.all.index', [
            'title' => "Каталог",
            'description' => "",
            'breadcrumbs' => $breadcrumbs,
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $path = CategoryPath::where("path", $request->slugs)->firstOrFail();

        $categoryStandard = app()->make(CategoryStandard::class, [
            'params' => [
                "is_on" => 1,
                "product_count" => 1,
            ],
        ]);

        $category = Category::standard($categoryStandard)
            ->where("id", $path->category_id)
            ->firstOrFail();

        //

        $breadcrumbs = self::breadcrumb($path);

        //

        $categories = Category::standard($categoryStandard)
            ->where("category_parent_id", $category->id)
            ->with(['child_categories' => function ($q) use ($categoryStandard){
                $q->select(["id", "name", "slug", "category_parent_id"])
                    ->standard($categoryStandard);
            }])
            ->get();

        //

        // фильтры

        $request->merge([
            "category_id" => $category->id,
        ]);
        $properties = (new PropertyController($request))->process();

        return view('sample.main.pages.category.first.index', [
            'title' => $category->name,
            'description' => "",
            "breadcrumbs" => $breadcrumbs,
            "category" => $category,
            "categories" => $categories,
            "path" => route("category", ["slugs" => $path->path]),
            "path_id" => $path->id,
            "properties" => $properties
        ]);
    }

    public function filter(FilterRequest $request)
    {
        $result = (new ProductController)->list($request);

        // if (isset($request->filters) || isset($request->rang_filters)) {
            $properties = (new PropertyController($request, is_short: 1))->process();
            $result["properties"] = $properties;
        // }

        return $result;
    }
}
