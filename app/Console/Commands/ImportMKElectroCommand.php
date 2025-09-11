<?php

namespace App\Console\Commands;

use App\Http\Services\ImportMKElectro\IndexService;
use Illuminate\Console\Command;

class ImportMKElectroCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-mk-electro-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Интеграция данных из мкэлектро';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump("Запуск очистки");
        (new IndexService())->cleaning();

        dump("Запуск интеграции");
        (new IndexService())->start();
    }
}
