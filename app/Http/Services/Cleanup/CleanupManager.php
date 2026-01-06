<?php

namespace App\Http\Services\Cleanup;

use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Helper\ProgressBar;

class CleanupManager extends CleanupService
{
    private $bar = null;

    public function all()
    {
        if($this->output)
        {
            $this->bar = new ProgressBar($this->output, 9);
            $this->bar->setFormat('%current%/%max% [%bar%] %message%');
        }

        //

        $this->nextAdvance('Точки');
        (new PointCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Банеры');
        (new BannerCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Категории');
        (new CategoryCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Компании');
        (new CompanyCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Корзины');
        (new CartCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Избранные');
        (new WishlistCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Товары');
        (new ProductCleanupService())->start();

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Характеристики');
        (new PropertyCleanupService())->start();

        //

        usleep(200000); // 0.3 секунды
        $this->nextAdvance(message: 'Сброс проекта');

        Artisan::call('optimize:clear');

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
