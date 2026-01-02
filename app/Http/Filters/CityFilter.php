<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CityFilter extends AbstractFilter
{
    public const KEY = 'key';
    public const SEARCH = 'search';
    public const SLUG = 'slug';
    public const NAME = 'name';

    protected function getCallbacks(): array
    {
        return [
            self::KEY => [$this, 'key'],
            self::SEARCH => [$this, 'search'],
            self::SLUG => [$this, 'slug'],
            self::NAME => [$this, 'name'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function slug(Builder $builder, $value)
    {
        $builder->where("slug", $value);
    }

    public function key(Builder $builder, $value)
    {
        $builder->where("key", $value);
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', $value);
    }
}
