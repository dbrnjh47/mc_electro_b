<?php

namespace App\Http\Services\Cleanup;

use App\Http\Services\CommandService;
use Illuminate\Support\Facades\Storage;

class CleanupService extends CommandService
{
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
}
