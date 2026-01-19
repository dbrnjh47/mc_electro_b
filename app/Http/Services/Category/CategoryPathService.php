<?php

namespace App\Http\Services\Category;

use App\Models\Category\Category;
use App\Models\Category\CategoryPath;

class CategoryPathService
{
    public function __construct(public $category = null)
    {
        // dump($this->category);
    }
    public function delete()
    {
        $category_id = (string)$this->category->id;
        CategoryPath::where('category_ids', '=', $category_id)
            ->orWhere('category_ids', 'LIKE', '%,' . $category_id)
            ->orWhere('category_ids', 'LIKE', $category_id . ',%')
            ->orWhere('category_ids', 'LIKE', '%,' . $category_id . ',%')
            ->delete();
    }

    public function createAll()
    {
        $start_slugs = [];
        $start_ids = [];
        $paths = [];
        // стандартный путь, поскольку родитель у категорий всегодя один

        $parent_ids = $this->category->getParentIds();
        $parent_ids = $parent_ids->pluck('category_parent_id')->filter()->toArray();
        $parent_ids = array_reverse($parent_ids);
        // dump("parent_ids", $parent_ids);

        if (!empty($parent_ids)) {
            $parents = Category::whereIn("id", $parent_ids)->get()->keyBy('id');

            // dump($parents);
            foreach ($parent_ids as $parent_id) {
                $start_slugs[] = $parents[$parent_id]["slug"];
                $start_ids[] = $parents[$parent_id]["id"];
            }
        }

        //

        $start_slugs[] = $this->category->slug;
        $start_ids[] = $this->category->id;

        $paths[] = [
            "category_id" => $this->category->id,
            "path" => implode('/', $start_slugs),
            "category_ids" => implode(',', $start_ids),
        ];
        // dump($start_slugs, $start_ids);
        // dump("_______________");

        // получение остальных дочерних путей

        $children_ids = $this->category->getChildrenIds();
        $children_ids = $children_ids->pluck('id')->filter()->toArray();
        // dump($this->category->getChildrenIds());
        // dump($children_ids);
        if (!empty($children_ids)) {
            $map = [];
            $child_paths = [];

            // Сначала создаем маппинг
            foreach ($this->category->getChildrenIds() as $cat) {
                $map[$cat->id] = [
                    'id' => $cat->id,
                    'parent' => $cat->category_parent_id,
                    'path' => null
                ];
            }

            // Рекурсивно строим пути
            foreach ($map as $id => $data) {
                $path = [];
                $currentId = $id;

                while (isset($map[$currentId])) {
                    array_unshift($path, $currentId);
                    $currentId = $map[$currentId]['parent'];

                    // Если родитель 0 или null - это корень
                    if (!$currentId) {
                        break;
                    }
                }

                $child_paths[] = $path;
            }

            unset($map);
            // dump("child_paths", $child_paths);

            //

            $childrens = Category::whereIn("id", $children_ids)->get()->keyBy('id');
            foreach($child_paths as $child_path)
            {
                $child_slugs = $start_slugs;
                foreach($child_path as $category_id)
                {
                    $child_slugs[] = $childrens[$category_id]->slug;
                }

                //

                $child_ids = $start_ids;
                $child_ids = array_merge($child_ids, $child_path);

                $paths[] = [
                    "category_id" => end($child_path),
                    "path" => implode('/', $child_slugs),
                    "category_ids" => implode(',', $child_ids),
                ];
            }
        }

        // запись в таблицу путей

        CategoryPath::upsert(
            $paths,
            ['category_ids', 'path'], // Уникальные ключи
            [] // Поля для обновления (пусто = не обновлять)
        );
    }
}
