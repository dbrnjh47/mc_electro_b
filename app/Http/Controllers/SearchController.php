<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Category\ProductController;
use App\Http\Controllers\Category\PropertyController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\SearchRequest;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(SearchRequest $request)
    {
        $properties = (new PropertyController($request))->process();
        $html_products = null;
        if($properties->isEmpty())
        {
            $html_products = (new ProductController)->list($request);
        }

        return view('sample.main.pages.search', [
            "title" => "Поиск",
            'description' => "",
            "properties" => $properties,
            "html_products" => $html_products
        ]);
    }
}
