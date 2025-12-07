<?php


namespace App\Models\Traits;


use App\Http\Standards\StandardInterface;
use Illuminate\Database\Eloquent\Builder;

trait Standardable
{
    /**
     * @param Builder $builder
     * @param StandardInterface $standard
     *
     * @return Builder
     */
    public function scopeStandard(Builder $builder, StandardInterface $standard)
    {
        $standard->apply($builder);

        return $builder;
    }
}
