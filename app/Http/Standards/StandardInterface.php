<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

interface StandardInterface
{
    public function apply(Builder $builder);
    public function default(Builder $builder);
}
