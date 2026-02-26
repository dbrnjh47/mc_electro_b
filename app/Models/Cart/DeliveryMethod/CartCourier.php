<?php

namespace App\Models\Cart\DeliveryMethod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCourier extends Model
{
    /** @use HasFactory<\Database\Factories\Order\DeliveryMethod\DeliveryMethodCourierFactory> */
    use HasFactory;
    protected $guarded = false;
    public function getFullAddress()
    {
        $full = "г. {$this->city}, {$this->street} {$this->house}";
        if($this->apartment){$full .= " {$this->apartment}кв.";}
        return $full;
    }
}
