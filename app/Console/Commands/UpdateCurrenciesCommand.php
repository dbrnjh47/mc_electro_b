<?php

namespace App\Console\Commands;

use App\Http\Services\Currency\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use DateTimeInterface;
use DateInterval;

class UpdateCurrenciesCommand extends Command implements Isolatable
{
    /**
     * Определите, когда истекает срок действия блокировки изоляции для команды.
     */
    public function isolationLockExpiresAt(): DateTimeInterface|DateInterval
    {
        return now()->addHour();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-currencies-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление курсов';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "\n";
        dump("start - UpdateCurrenciesCommand");
        (new CurrencyService)->update();
    }
}
