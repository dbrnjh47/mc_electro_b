<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function all()
    {

       $i = Category::find(4);
    //    dd($i->children());
    //    dd($i->parents());

        return view('sample.main.pages.category.all.index', ['title' => "Категории", 'description' => ""]);
    }

    public function show(Request $request)
    {
        $slugs = explode('/', $request->slugs);
        $category = (new CategoryModelService)->firstBySlug(end($slugs));
        $category->parent_slugs = $slugs;
        $category->parents();
        if(!$category || !in_array($request->slugs, $category->parents_paths))
        {
            $this->notFound();
        }

        dump($request->slugs);
        dump($category->parents_paths);
        dump($category->parent_list);
        dd($category);
        return view('sample.main.pages.category.first.index', ['title' => "Категорию", 'description' => ""]);
    }
}
