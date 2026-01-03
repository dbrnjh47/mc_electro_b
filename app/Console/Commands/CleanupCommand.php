<?php

namespace App\Console\Commands;

use App\Http\Services\Cleanup\CleanupManager;
use Illuminate\Console\Command;

class CleanupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleaning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очистка проекта ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->write("\033[2J\033[;H");
        dump("Запуск очистки");

        (new CleanupManager($this->output))->all();
    }
}
