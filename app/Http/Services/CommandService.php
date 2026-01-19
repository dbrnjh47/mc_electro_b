<?php

namespace App\Http\Services;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;

class CommandService
{
    public ?OutputInterface $output = null;
    public $log = null;
    public function __construct()
    {
        if (app()->runningInConsole()) {
            $this->output = new ConsoleOutput();
        }
    }

    public function success(string $message): void
    {
        if ($this->output) {
            $this->output->writeln("<fg=black;bg=#00ff00> {$message} </>");
        }
        if($this->log)
        {
            $this->log->info($message);
        }
    }

    public function info(string $message): void
    {
        if ($this->output) {
            $this->output->writeln("<fg=#00ffff>{$message}</>");
        }
        if($this->log)
        {
            $this->log->info($message);
        }
    }

    public function error(string $message)
    {
        if ($this->output) {
            $this->output->writeln("<fg=red>{$message}</>");
        }
        if($this->log)
        {
            $this->log->error($message);
        }
    }

    public function write(string $message): void
    {
        if ($this->output) {
            $this->output->writeln($message);
        }
        if($this->log)
        {
            $this->log->debug($message);
        }
    }
}
