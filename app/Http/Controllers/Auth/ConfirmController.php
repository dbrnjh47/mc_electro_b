<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ConfirmRequest;
use App\Http\Services\Auth\ConfirmService;
use Illuminate\Http\Request;

class ConfirmController extends IndexController
{
    public function index(ConfirmRequest $request)
    {
        return (new ConfirmService)->confirm($request);
    }
}
