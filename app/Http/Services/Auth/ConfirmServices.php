<?php

namespace App\Http\Services\Auth;

use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\Auth\ConfirmeValidations;

class ConfirmServices extends Validation
{
    public function __construct()
    {
        $this->validation = new ConfirmeValidations();
    }

}
