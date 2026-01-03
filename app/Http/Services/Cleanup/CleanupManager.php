<?php

namespace App\Http\Services\Cleanup;

use Illuminate\Support\Facades\Artisan;

class CleanupManager extends CleanupService
{
    private $bar = null;

    public function all()
    {
        if($this->output)
        {
            $this->bar = $this->output->createProgressBar(9);
            $this->bar->setFormat('%current%/%max% [%bar%] %message%');
        }

        //

        $this->nextAdvance('Точки');
        (new PointCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Банеры');
        (new BannerCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Категории');
        (new CategoryCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Компании');
        (new CompanyCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Корзины');
        (new CartCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Избранные');
        (new WishlistCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Товары');
        (new ProductCleanupService($this->output))->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Характеристики');
        (new PropertyCleanupService($this->output))->start();

        //

        usleep(200000); // 0.3 секунды
        $this->nextAdvance(message: 'Сброс проекта');

        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');

        if (array_key_exists('event:clear', Artisan::all())) {
            Artisan::call('event:clear');
        }

        // очистка сессий?

        // кеширование по новой
        if (app()->environment('production')) {
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('view:cache');
        }

        if($this->bar)
        {
            $this->bar->finish();
        }
    }

    private function nextAdvance($message)
    {
        if($this->bar)
        {
            $this->output->writeln("");
            $this->bar->setMessage($message);
            $this->bar->advance();
            $this->output->writeln("");
        }
    }
}
