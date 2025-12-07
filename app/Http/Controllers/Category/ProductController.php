<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Standards\ProductStandard;
use App\Models\Product\Product;
use App\Http\Filters\ProductFilter;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Category\Category;
use App\View\Components\Sample\Main\Product\Card;
use App\View\Components\Sample\Main\Product\FeedbackCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ProductController extends Controller
{
    public function list(FilterRequest $request)
    {
        // старое получение айдишников дочерних категорий
        // $category_ids = new Category();
        // $category_ids->id = $request->category_id;
        // $category_ids = $category_ids->childrens(only_ids:1);

        $productStandard = app()->make(ProductStandard::class, ['params' => [
            "is_on" => ["category"],
            "preview" => 1
        ]]);
        $productFilter = app()->make(ProductFilter::class, ['params' => array_filter($request->all())]);
        $products = Product::standard($productStandard)
            ->filter($productFilter)
            ->paginate(8, page:$request->page);

        $products_html = "";
        foreach($products as $product)
        {
            $products_html .= Blade::renderComponent(new Card($product));
        }

        $products_html .= Blade::renderComponent(new FeedbackCard());
        return [
            "products" => $products_html,
            "paginate" => $products->onEachSide(1)->links()->render()
        ];
    }

}
