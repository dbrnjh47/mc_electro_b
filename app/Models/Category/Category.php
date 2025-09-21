<?php

namespace App\Models\Category;

use App\Http\Services\Models\CategoryModelService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use Sluggable;

    protected $guarded = false;
    const PATH = "/assets/categories/previews/";

    protected $appends = ['preview_path'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => false, // обновлять slug при изменении title
                'unique' => true, // гарантировать уникальность
                'separator' => '-', // разделитель
                // 'maxLength' => 100, // максимальная длина
                // 'method' => function ($string, $separator) {
                //     return Str::slug($string, $separator);
                // }
            ]
        ];
    }

    public function getPreviewPathAttribute()
    {
        return ($this->preview ? Controller::photoAccessor($this->preview, self::PATH) : null);
    }

    public function relation_parent()
    {
        return $this->hasOne(Subcategory::class, 'category_child_id', 'id');
    }

    public function relation_childrens()
    {
        return $this->hasMany(Subcategory::class, 'category_parent_id', 'id');
    }

    public function childrens($max_level = null)
    {
        if (isset($this->children_on)) {
            return $this->childrens;
        }
        $childrens = DB::table(DB::raw("
        (WITH RECURSIVE subcategories AS (
            SELECT
                category_child_id,
                category_parent_id,
                0 AS level,
                CAST(SUBSTRING(categories.slug, 1, 255) AS CHAR(255)) AS path
                -- categories.slug AS path
            FROM " . (new Subcategory())->getTable() . " as c
            LEFT JOIN categories ON c.category_child_id = categories.id
            WHERE c.category_parent_id = {$this->id} AND categories.is_on = 1

            UNION ALL

            SELECT
                c.category_child_id,
                c.category_parent_id,
                s.level + 1,
                CAST(SUBSTRING(CONCAT(s.path, '/', categories.slug), 1, 255) AS CHAR(255)) AS path
                -- CONCAT(s.path, '/', categories.slug ) AS path
            FROM " . (new Subcategory())->getTable() . " c
            INNER JOIN subcategories s ON s.category_child_id = c.category_parent_id
            LEFT JOIN categories ON c.category_child_id = categories.id
            WHERE categories.is_on = 1
            " . ($max_level ? "AND s.level < {$max_level}" : "") . "
        )
        SELECT * FROM subcategories as cp) as subquery
        "))->get();

        $childrens = $this->addInfo($childrens, is_child: 1);

        $childrens = $this->buildTreeChildren($childrens);

        $this->childrens = $childrens;
        $this->children_on = 1;
        return $childrens;
    }


    public function parents($max_level = null, $on_check = 1)
    {
        if (isset($this->parents_on)) {
            return $this->parents;
        }
        $parents = DB::table(DB::raw("
            (WITH RECURSIVE CategoryPath AS (
                SELECT
                    category_parent_id,
                    category_child_id,
                    0 AS level
                FROM
                    " . (new Subcategory())->getTable() . "
                LEFT JOIN
                    categories ON " . (new Subcategory())->getTable() . ".category_parent_id = categories.id
                WHERE
                    category_child_id = {$this->id} ".($on_check ? "AND categories.is_on = 1" : "")."
                UNION ALL
                SELECT
                    c.category_parent_id,
                    c.category_child_id,
                    cp.level + 1 AS level
                FROM
                    " . (new Subcategory())->getTable() . " AS c
                INNER JOIN
                    CategoryPath cp ON c.category_child_id = cp.category_parent_id
                LEFT JOIN
                    categories ON c.category_parent_id = categories.id
                ".($on_check ? "WHERE categories.is_on = 1" : "")."
                " . ($max_level ? (($on_check ? "AND" : "WHERE")." cp.level < {$max_level}") : "") . "
            )
            SELECT * FROM CategoryPath as cp) as subquery
        "))->get();
        // dump($this->id);
        // dump($parents);
        // dump("__________________");
        $this->parents_array = $this->addInfo($parents);
        // dd($parents);
        $this->setCurrentParentPath();

        $parents = $this->buildTree($this->parents_array);
        $this->parents = $parents;
        $this->parents_paths = $this->getParentsPath($this->parents, $this->slug);
        $this->parents_on = 1;

        return $parents;
    }

    public function setCurrentParentPath($parents = null)
    {
        if(!$parents)
        {
            $parents = $this->parents_array;
        }
        if(!isset($this->parent_slugs)){
            $this->parent_list = null;
            return;
        }

        $path = $this->slug;
        $parent_list = [];
        foreach($this->parent_slugs as $slug)
        {
            foreach($parents as $parent)
            {
                if($parent->slug == $slug)
                {
                    $path = $parent->url."/".$path;
                    $parent->url = $path;
                    $parent_list[] = $parent;
                    break;
                }
            }
        }
        $this->parent_list = $parent_list;
        return;
    }

    private function getParentsPath($items, $parent_path = '')
    {
        $paths = [];

        if (!$items) {
            $paths[] = $parent_path;
        } else {
            foreach ($items as $item) {
                $current_path = $parent_path ? $item->slug . '/' .  $parent_path : $item->slug;
                if($item->is_on)
                {
                    if (!empty($item->parents)) {
                        $childPaths = $this->getParentsPath($item->parents, $current_path);
                        $paths = array_merge($paths, $childPaths);
                    } else {
                        $paths[] = $current_path;
                    }
                }

            }
        }

        return $paths;
    }

    private function addInfo($result, $is_child = 0)
    {
        $parent_ids = $result->flatMap(function ($item) {
            return [$item->category_parent_id, $item->category_child_id];
        })
            ->unique()
            ->values()
            ->toArray();

        $categories = (new CategoryModelService(["id", "is_on", "slug", "name", "preview"], on_check: 0))->getIn($parent_ids);

        foreach ($categories as $category) {
            foreach ($result as $key => $parent) {
                if (!$is_child && $parent->category_parent_id == $category->id) {
                    $category->category_parent_id = $result[$key]->category_parent_id;
                    $category->category_child_id = $result[$key]->category_child_id;
                    $category->level = $result[$key]->level;
                    $result[$key] = $category;
                } else if ($is_child && $parent->category_child_id == $category->id) {
                    $category->category_parent_id = $result[$key]->category_parent_id;
                    $category->category_child_id = $result[$key]->category_child_id;
                    $category->level = $result[$key]->level;
                    $category->path = $result[$key]->path;
                    $result[$key] = $category;
                    // $result[$key] = (object)array_merge((array)$category, (array)$result[$key]);
                }
            }
        }

        return $result;
    }

    private function buildTree($list, $level = 0, $id = null)
    {
        $tree = [];

        foreach ($list as $item) {
            if ($level != $item->level) {
                continue;
            }
            if ($id != null && $item->category_child_id != $id) {
                continue;
            } else {
                $item->parents = $this->buildTree($list, $item->level + 1, $item->category_parent_id);
            }

            $tree[] = $item;
        }
        if (empty($tree)) {
            return null;
        }

        return $tree;
    }

    private function buildTreeChildren($list, $level = 0, $id = null)
    {

        $tree = [];

        foreach ($list as $item) {
            if ($level != $item->level) {
                continue;
            }
            if ($id != null && $item->category_parent_id != $id) {
                continue;
            }
            $item->childrens = $this->buildTreeChildren($list, $item->level + 1, $item->category_child_id);


            $tree[] = $item;
        }
        if (empty($tree)) {
            return null;
        }
        return $tree;
    }
}
