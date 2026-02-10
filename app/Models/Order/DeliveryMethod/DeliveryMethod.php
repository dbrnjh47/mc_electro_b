<?php

namespace App\Models\Order\DeliveryMethod;

use App\Models\Order\Payment\Payment;
use App\Models\User\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryMethodFactory> */
    use HasFactory;

    public function payments()
    {
        return $this->belongsToMany(
            Payment::class,          // Целевая модель
            (new DeliveryMethodPayment())->getTable(),     // Промежуточная таблица
        );
    }
}
