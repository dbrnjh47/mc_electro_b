<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class DeliveryMethodFilter extends AbstractFilter
{
    protected function getCallbacks(): array
    {
        return [
        ];
    }

    public function default(Builder $builder)
    {
    }
}
