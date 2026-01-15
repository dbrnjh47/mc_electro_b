<?php

namespace App\Http\Services\Media;

use Illuminate\Support\Facades\Storage;
use Imagick;
use ImagickException;
use Illuminate\Http\UploadedFile;

class MediaService
{
    public $video_extensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv'];
    public $ImgAllowedExtensions = ['webp', 'jpg', 'png', 'jpeg'];
    public int $maxWidth = 550;
    public int $maxHeight = 550;
    public int $maxSizeKb = 100;
    public int $defaultQuality = 85;

    public function is_video($name)
    {
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        return in_array($extension, $this->video_extensions);
    }

    public function createMiniature(string $directory, string $filePath)
    {
        try {
            // Проверяем существует ли исходный файл
            if (!Storage::disk('public_user')->exists($filePath)) {
                \Log::warning("Original file not found: {$filePath}");
                return null;
            }

            // Получаем содержимое файла
            $file = Storage::disk('public_user')->get($filePath);

            // Создаем Imagick из содержимого
            $imagick = new Imagick();
            $imagick->readImageBlob($file);

            // Обрабатываем изображение
            $imagick->resizeImage(
                $this->maxWidth,
                $this->maxHeight,
                Imagick::FILTER_LANCZOS, // Лучшее качество для уменьшения
                1,                       // Без размытия
                true                    // Точные размеры
            );

            // Получаем обработанные данные
            $thumbnailData = $imagick->getImageBlob();

            // Генерируем путь для миниатюры
            $path = $this->generateThumbnailPath($directory, $filePath);

            // Сохраняем миниатюру
            Storage::disk('public_user')->put($path, $thumbnailData);

            // Очищаем память
            $imagick->destroy();

            // \Log::info("Thumbnail created: {$path}");

            return $path;
        } catch (ImagickException $e) {
            \Log::error('Thumbnail creation failed: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            \Log::error('Unexpected error: ' . $e->getMessage());
            return null;
        }
    }

     /**
     * Генерация пути для миниатюры
     */
    private function generateThumbnailPath(string $directory, string $filePath): string
    {
        // Извлекаем имя файла из оригинального пути
        $filename = basename($filePath);

        // Убираем расширение и добавляем суффикс если нужно
        $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);

        // Создаем новое имя файла
        $newFilename = $nameWithoutExt . '.webp';

        // Формируем полный путь
        return rtrim($directory, '/') . '/' . $newFilename;
    }
}
