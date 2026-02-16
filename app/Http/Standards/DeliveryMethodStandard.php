<?php

namespace App\Http\Standards;

use App\Models\City\City;
use Illuminate\Database\Eloquent\Builder;

class DeliveryMethodStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';
    public const SORT = 'sort';
    public const CITY_ID = 'city_id';
    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::SORT => [$this, 'sort'],
            self::CITY_ID => [$this, 'cityId'],
        ];
    }

    public function default(Builder $builder)
    {
    }
    public function sort(Builder $builder, $value)
    {

    }
    public function isOn(Builder $builder, $exclusion_list)
    {
        // $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        $builder->where("is_on", 1);
    }

    public function cityId(Builder $builder, $value)
    {
        $builder->where(function ($query) {
            $query->whereDoesntHave('cities');
            if(app()->user_city)
            {
                $query->orWhereHas('cities', function ($q) {
                    $cityModel = new City();
                    $q->where($cityModel->getTable().'.id', app()->user_city->id);
                });
            }
        });
    }
}
