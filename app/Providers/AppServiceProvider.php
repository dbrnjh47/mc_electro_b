<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Grammars\MySqlGrammar;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Получаем текущее соединение и подменяем в нем Grammar
        $connection = DB::connection();

        $grammar = new class extends MySqlGrammar {
            /**
             * Compile the random statement for MySQL.
             */
            public function compileRandom($seed)
            {
                // Это сердце фикса: если seed пришел как 0 или null,
                // мы принудительно возвращаем просто RAND() без скобок с нулем.
                if ($seed === 0 || $seed === '0' || is_null($seed)) {
                    return 'RAND()';
                }

                return 'RAND(' . $seed . ')';
            }
        };

        $connection->setQueryGrammar($grammar);

        Paginator::defaultView('sample.main.components.pagination');
    }
}
