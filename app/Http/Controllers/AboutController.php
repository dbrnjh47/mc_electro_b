<?php

namespace App\Http\Controllers;

use App\Http\Services\BreadcrumbService;
use App\Http\Services\User\CartService;
use App\Http\Services\User\WishListService;
use App\Http\Standards\ProductStandard;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function show()
    {
        $wishlist_id = (new WishListService(0))->getID();
        $cart_id = (new CartService(0))->getID();

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


        $products = Cache::remember('about.products.random', Carbon::now()->addDays(7), function () use ($productStandard) {
            return Product::select(['id', 'mrp', 'slug', 'step', 'name', 'uuid'])
                ->standard($productStandard)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        });
        //

        $title = "О нас";
        $description = "";

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add($title, route("about"));

        return view(
            'sample.main.pages.about',
            compact(
                'title',
                'description',
                'breadcrumbs',
                'products'
            )
        );
    }
}
