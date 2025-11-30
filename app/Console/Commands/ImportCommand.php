<?php

namespace App\Console\Commands;

use App\Http\Services\Import\ImportService;
use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-db-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Интеграция данных';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump("Запуск очистки");
        (new ImportService())->cleaning();

        dump("Запуск интеграций");
        (new ImportService())->start();
    }
}
