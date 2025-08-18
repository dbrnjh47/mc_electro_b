<?php

namespace App\Http\Services;

class MediaService
{
    public $video_extensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv'];
    public function is_video($name)
    {
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        return in_array($extension, $this->video_extensions);
    }
}
