<?php

namespace App\Console\Commands;

use App\Http\Services\Category\CheckCategoryStatusService;
use Illuminate\Console\Command;

class CheckCategoryStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-category-status-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Проверка статуса категорий';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new CheckCategoryStatusService)->process();
    }
}
