<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class MediaService
{
    public $video_extensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv'];
    public $img_extensions = ['webp', 'jpg', 'png', 'jpeg'];
    public function is_video($name)
    {
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        return in_array($extension, $this->video_extensions);
    }

    public function createImgBase64($path, $media)
    {
        if (strpos($media, 'base64,') !== false) {
            $media = explode('base64,', $media)[1];
        }
        $media = base64_decode($media, true);
        if ($media === false) {
            return null;
            // dd("Invalid base64 data");
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_buffer($finfo, $media);
        finfo_close($finfo);

        // проверка типа файла
        $extension = explode('/', $mime_type)[1] ?? '';
        if(strpos($mime_type, 'image/') != 0 || !in_array($extension, $this->img_extensions))
        {
            return null;
        }

        Storage::disk('public_user')->put($path, $media);
        return basename($path);
    }
}
