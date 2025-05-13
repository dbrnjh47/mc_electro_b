<?php

namespace App\Models\Category;

use App\Http\Services\Models\CategoryModelService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = false;

    public function locale()
    {
        return $this->hasOne(CategoryLocal::class, 'category_id', 'id');
    }

    public function children($max_level = null)
    {
        if(isset($this->children_on)){return $this->children;}
        $children = DB::table(DB::raw("
        (WITH RECURSIVE subcategories AS (
            SELECT category_child_id, category_parent_id, 0 AS level
                FROM ".(new Subcategory())->getTable()."
            WHERE category_parent_id = {$this->id}

            UNION ALL

            SELECT c.category_child_id, c.category_parent_id, s.level + 1
                FROM ".(new Subcategory())->getTable()." c
            INNER JOIN subcategories s ON s.category_child_id = c.category_parent_id
            ".($max_level ? "WHERE s.level < {$max_level}" : "")."
        )
        SELECT * FROM subcategories as cp) as subquery
        "))->get();
        $children = $this->addInfo($children, is_child: 1);

        $children = $this->buildTreeChildren($children);

        $this->children = $children;
        $this->children_on = 1;
        return $children;
    }


    public function parents($max_level = null)
    {
        if(isset($this->parents_on)){return $this->parents;}
        $parents = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    category_parent_id,
                    category_child_id,
                    0 AS level
                FROM
                    ".(new Subcategory())->getTable()."
                WHERE
                    category_child_id = {$this->id}
                UNION ALL
                SELECT
                    c.category_parent_id,
                    c.category_child_id,
                    cp.level + 1 AS level
                FROM
                    ".(new Subcategory())->getTable()." AS c
                INNER JOIN
                    CategoryPath cp ON c.category_child_id = cp.category_parent_id
                ".($max_level ? "WHERE cp.level < {$max_level}" : "")."
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();
        $parents = $this->addInfo($parents);


        $parents = $this->buildTree($parents);
        $this->parents = $parents;
        $this->parents_on = 1;
        return $parents;
    }

    private function addInfo($result, $is_child = 0)
    {
        $parent_ids = $result->flatMap(function ($item) {
            return [$item->category_parent_id, $item->category_child_id];
        })
        ->unique()
        ->values()
        ->toArray();

        $categories = (new CategoryModelService())->getIn($parent_ids);

        foreach($categories as $category)
        {
            foreach($result as $key => $parent)
            {
                if(!$is_child && $parent->category_parent_id == $category->id)
                {
                    $result[$key] = (object)array_merge((array)$category, (array)$result[$key]);
                } else if($is_child && $parent->category_child_id == $category->id)
                {
                    $result[$key] = (object)array_merge((array)$category, (array)$result[$key]);
                }
            }
        }

        return $result;
    }

    private function buildTree($list, $level = 0, $id = null) {

        $tree = [];

        foreach ($list as $item) {
            if($level != $item->level){continue;}
            if($id != null && $item->category_child_id != $id){continue;}
            else {
                $item->parents = $this->buildTree($list, $item->level + 1, $item->category_parent_id);
            }

            $tree[] = $item;
        }
        if(empty($tree)){return null;}
        return $tree;
    }

    private function buildTreeChildren($list, $level = 0, $id = null) {

        $tree = [];

        foreach ($list as $item) {
            if($level != $item->level){continue;}
            if($id != null && $item->category_parent_id != $id){continue;}
            $item->children = $this->buildTreeChildren($list, $item->level + 1, $item->category_child_id);


            $tree[] = $item;
        }
        if(empty($tree)){return null;}
        return $tree;
    }
}
