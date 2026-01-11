<?php

namespace App\Http\Controllers;

use App\Http\Services\BreadcrumbService;
use App\Http\Services\User\WishListService;
use App\Http\Standards\ProductStandard;
use App\Models\Product\Product;

class AboutController extends Controller
{
    public function show()
    {
        $wishlist_id = (new WishListService(0))->getID();

        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "preview" => 1,
                "labels" => 1
            ],
        ]);

        $products = Product::standard($productStandard)
            ->select(['id', 'mrp', 'slug', 'step', 'name', 'article'])
            ->inRandomOrder()
            ->limit(6)
            ->get();
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
