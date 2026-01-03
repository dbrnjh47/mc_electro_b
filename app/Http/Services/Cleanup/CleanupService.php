<?php

namespace App\Http\Services\Cleanup;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Output\OutputInterface;

class CleanupService
{
    public function __construct(public ?OutputInterface $output = null)
    {

    }

    public function deleteFiles($directory, $exclude)
    {
        $this->info("Удаление файлов в папке {$directory}");

        $files = Storage::disk('public_user')->files($directory);
        $total_count = count($files);
        $count = 0;

        foreach ($files as $file) {
            $basename = basename($file);

            if (!in_array($basename, $exclude)) {
                Storage::disk('public_user')->delete($file);
                $count++;
            }
        }

        $this->success("Удалено {$count} из {$total_count} файлов");
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
