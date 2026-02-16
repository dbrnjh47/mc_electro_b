<?php

namespace App\Http\Controllers;

use App\Http\Filters\BannerFilter;
use App\Http\Services\User\CartService;
use App\Http\Services\User\WishListService;
use App\Http\Standards\BannerStandard;
use App\Http\Standards\CategoryStandard;
use App\Http\Standards\ProductStandard;
use App\Models\Banner\Banner;
use App\Models\Category\Category;
use App\Models\Company\Company;
use App\Models\Product\Product;
use Illuminate\Http\Request;
class PageController extends Controller
{
    public function index(Request $request)
    {
        $wishlist_id = (new WishListService(0))->getID();
        $cart_id = (new CartService(0))->getID();

        //

        $categoryStandard = app()->make(CategoryStandard::class, [
            'params' => [
                "is_on" => 1,
                "product_count" => 1,
                "sort" => 1,
            ],
        ]);

        $categories = Category::select(["id", "name", "slug", "category_parent_id","preview"])
            ->standard($categoryStandard)
            ->whereNull("category_parent_id")
            ->with(['child_categories' => function ($q) use ($categoryStandard){
                $q->select(["id", "name", "slug", "category_parent_id"])
                    ->standard($categoryStandard);
            }])
            // ->inRandomOrder()
            ->limit(4)
            ->get();

        //

        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "cart" => $cart_id,
                "preview" => 1,
                "labels" => 1,
                "is_archive" => 0,
                "city_point_count" => (app()->user_city ? app()->user_city->id : 0),
                "point_count" => (app()->user_city ? app()->user_city->id : 0),
            ],
        ]);

        $products = Product::select(['id', 'mrp', 'slug', 'step', 'name', 'uuid'])
            ->standard($productStandard)
            ->inRandomOrder()
            ->limit(8)
            ->get();

        // dd( $products);

        //
        $bannerStandard = app()->make(BannerStandard::class, [
            'params' => [
                "is_on" => 1,
                "sort" => 1
            ],
        ]);

        $bannerFilter = app()->make(BannerFilter::class, [
            'params' => [
                "key" => "home",
                "city_id" => (app()->user_city ? app()->user_city->id : null)
            ]
        ]);
        $banners = Banner::standard($bannerStandard)
            ->filter($bannerFilter)
            ->get();

        $title = app()->settings->abbreviation." ".app()->settings->name;
        $description = "";
        return view('sample.main.pages.index', compact(
            "categories",
            "banners",
            "title",
            "description",
            "products"
        ));
    }

    public function feedback(Request $request)
    {
        return view('sample.main.pages.feedback.index', ['title' => "Спасибо!"]);
    }
}
