<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\API\MKElectroApi;
use App\Http\Services\CommandService;
use Illuminate\Support\Facades\Log;

class MKElectroImportService extends CommandService
{
    public $api = null;
    public function __construct()
    {
        parent::__construct();
        $this->log = Log::channel('import');

        $this->api = (new MKElectroApi());
    }
}
