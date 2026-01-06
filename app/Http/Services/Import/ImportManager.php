<?php

namespace App\Http\Services\Import;

use App\Http\Services\Import\MKElectro\MKElectroImportManager;
use Symfony\Component\Console\Helper\ProgressBar;
class ImportManager extends ImportService
{
    public function all()
    {
        (new MKElectroImportManager)->all();
    }
}
