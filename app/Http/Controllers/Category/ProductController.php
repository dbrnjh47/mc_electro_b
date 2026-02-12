<?php

namespace App\Http\Controllers\Category;

use App\Http\Standards\ProductStandard;
use App\Models\Product\Product;
use App\Http\Filters\ProductFilter;
use App\Http\Services\User\CartService;
use App\Http\Services\User\WishListService;
use App\View\Components\Sample\Main\Product\Card;
use Illuminate\Support\Facades\Blade;

class ProductController
{
    public function list($request)
    {
        $wishlist_id = (new WishListService(0))->getID();
        $cart_id = (new CartService(0))->getID();

        $productStandard = app()->make(ProductStandard::class, ['params' => [
            "is_on" => ["category"],
            "wishlist" => $wishlist_id,
            "cart" => $cart_id,
            "preview" => 1,
            "labels" => 1,
            "is_archive" => 0
        ]]);
        $productFilter = app()->make(ProductFilter::class, ['params' => array_filter($request->all())]);
        $products = Product::standard($productStandard)
            ->filter($productFilter)
            ->paginate(8, page:(isset($request->page) ? $request->page : 1));

        $products_html = "";
        foreach($products as $product)
        {
            $products_html .= Blade::renderComponent(
                new Card(
                    $product,
                    (isset($request->path_id) ? $request->path_id : null)
                )
            );
        }

        // $products_html .= Blade::renderComponent(new FeedbackCard());
        return [
            "products" => $products_html,
            "paginate" => $products->onEachSide(1)->links()->render()
        ];
    }

}
