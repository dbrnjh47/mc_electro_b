<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PropertyFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';
    public const SEARCH = 'search';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::SEARCH => [$this, 'search'],
        ];
    }
    public function default(Builder $builder)
    {
    }
    public function search(Builder $builder, $value)
    {
    }
    public function categoryId(Builder $builder, $value)
    {
        $builder->whereHas('categories', function ($query) use ($value) {
            $query->where('category_id', $value);
        });
    }
}
