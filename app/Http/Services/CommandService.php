<?php

namespace App\Http\Services;

use Symfony\Component\Console\Output\OutputInterface;

class CommandService
{
    public function __construct(public ?OutputInterface $output = null)
    {

    }

    public function success(string $message): void
    {
        if ($this->output) {
            $this->output->writeln("<fg=black;bg=#00ff00> {$message} </>");
        }
    }

    public function info(string $message): void
    {
        if ($this->output) {
            $this->output->writeln("<fg=#00ffff>{$message}</>");
        }
    }

    public function error(string $message)
    {
        if ($this->output) {
            $this->output->writeln("<fg=red>{$message}</>");
        }
    }

    public function write(string $message): void
    {
        if ($this->output) {
            $this->output->writeln($message);
        }
    }
}
