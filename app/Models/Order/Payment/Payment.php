<?php

namespace App\Models\Order\Payment;

use App\Http\Controllers\Controller;
use App\Models\User\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Standardable;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    use Standardable;

    protected $appends = ['img_url'];
    const PATH = "/temple/images/cart/payments/";

    public function getImgUrlAttribute()
    {
        return $this->img
            ? Controller::photoAccessor($this->img, self::PATH."photo/")
            : null;
    }
}
