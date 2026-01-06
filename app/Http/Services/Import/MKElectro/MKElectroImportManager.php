<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\CommandService;
use Symfony\Component\Console\Helper\ProgressBar;

class MKElectroImportManager extends CommandService
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

        usleep(200000); // 0.3 секунды
        $this->nextAdvance('Точки');
        (new PointImportService())->start();

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
