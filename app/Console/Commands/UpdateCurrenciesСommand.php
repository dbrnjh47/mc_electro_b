<?php

namespace App\Console\Commands;

use App\Http\Services\Currency\CurrencyServices;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use DateTimeInterface;
use DateInterval;

class UpdateCurrenciesСommand extends Command implements Isolatable
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
    protected $signature = 'app:update-currencies-сommand';

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
        echo "start cpmand - UpdateCurrenciesСommand\n";
        (new CurrencyServices)->update();
    }
}
