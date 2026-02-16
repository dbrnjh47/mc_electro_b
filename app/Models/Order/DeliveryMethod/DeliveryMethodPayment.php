<?php

namespace App\Models\Order\DeliveryMethod;

use App\Models\User\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethodPayment extends Model
{
    /** @use HasFactory<\Database\Factories\Order\DeliveryMethod\DeliveryMethodPaymentFactory> */
    use HasFactory;

    public function person()
    {
        return $this->hasOne(Person::class, 'id', 'person_id');
    }
}
