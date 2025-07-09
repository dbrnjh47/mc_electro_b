<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Models\ProductModelService;

class IndexController extends Controller
{
    public function show($slug)
    {
        $product = (new ProductModelService(slug: $slug))
            ->getModel()
            ->with("medias")
            ->firstOrFail();
        // dump($product);
        return view('sample.main.pages.product.index', [
            'title' => $product->locale->name,
            'description' => "",
            'product' => $product
        ]);
    }
}
