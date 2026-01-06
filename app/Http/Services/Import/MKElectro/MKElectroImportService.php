<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\API\MKElectroApi;
use App\Http\Services\CommandService;

class MKElectroImportService extends CommandService
{
    public $api = null;
    public function __construct()
    {
        $this->api = (new MKElectroApi());
    }
}
