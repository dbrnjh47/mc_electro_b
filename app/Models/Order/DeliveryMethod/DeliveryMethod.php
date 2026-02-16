<?php

namespace App\Models\Order\DeliveryMethod;

use App\Models\City\City;
use App\Models\Order\Payment\Payment;
use App\Models\User\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;

class DeliveryMethod extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryMethodFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    public function delivery_payments()
    {
        return $this->hasMany(DeliveryMethodPayment::class, 'delivery_method_id', 'id');
    }

    public function payments()
    {
        return $this->belongsToMany(
            Payment::class,          // Целевая модель
            (new DeliveryMethodPayment())->getTable(),     // Промежуточная таблица
        );
    }

    public function cities()
    {
        return $this->belongsToMany(
            City::class,          // Целевая модель
            (new DeliveryMethodCity())->getTable(),     // Промежуточная таблица
        );
    }
}
