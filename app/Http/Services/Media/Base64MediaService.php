<?php

namespace App\Http\Services\Media;

use Illuminate\Support\Facades\Storage;
use Imagick;
use ImagickException;
use Illuminate\Http\UploadedFile;

class Base64MediaService extends MediaService
{
    /**
     * Создание и оптимизация изображения из base64
     */
    public function create(string $directory, string $media): ?string
    {
        try {
            // Декодируем base64
            $media = $this->extractAndDecodeBase64($media);
            if ($media === null) {
                return null;
            }

            // Проверяем MIME-тип
            if (!$this->isValidImage($media)) {
                return null;
            }

            // Обрабатываем изображение
            $imagick = $this->processImage($media);

            // Получаем обработанные данные
            $imageData = $imagick->getImageBlob();

            // Дополнительно сжимаем если нужно
            $imageData = $this->ensureMaxSize($imageData, $imagick);

            $filename = $this->generateFilename($media);
            $path = rtrim($directory, '/') . '/' . $filename;
            // Сохраняем
            Storage::disk('public_user')->put($path, $imageData);

            // Очищаем память
            $imagick->destroy();

            return basename($filename);
        } catch (ImagickException $e) {
            \Log::error('Image processing failed: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            \Log::error('Unexpected error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Создание имени файла с хешем
     */
    public function generateFilename(string $base64Data): string
    {
        $hash = md5($base64Data);
        return substr($hash, 0, 16) . '_' . time() . '.webp';
    }

    /**
     * Гарантирует максимальный размер файла
     */
    private function ensureMaxSize(string $imageData, Imagick $originalImagick): string
    {
        $currentSizeKb = strlen($imageData) / 1024;

        // Если уже меньше максимального размера - возвращаем как есть
        if ($currentSizeKb <= $this->maxSizeKb) {
            return $imageData;
        }

        \Log::info('Image too large: ' . round($currentSizeKb, 2) . 'KB, compressing...');

        // Стратегия сжатия: уменьшаем качество
        $quality = $this->defaultQuality;
        $minQuality = 10;

        while ($currentSizeKb > $this->maxSizeKb && $quality >= $minQuality) {
            $quality -= 5;

            // Клонируем оригинальное изображение
            $tempImagick = clone $originalImagick;
            $tempImagick->setImageCompressionQuality($quality);
            $tempImagick->setOption('webp:method', max(2, ceil($quality / 15)));

            $newData = $tempImagick->getImageBlob();
            $currentSizeKb = strlen($newData) / 1024;

            $tempImagick->destroy();

            \Log::debug('Trying quality ' . $quality . ': ' . round($currentSizeKb, 2) . 'KB');

            if ($currentSizeKb <= $this->maxSizeKb) {
                return $newData;
            }
        }

        // Если не удалось сжать качеством, уменьшаем размеры
        if ($currentSizeKb > $this->maxSizeKb) {
            return $this->reduceDimensions($originalImagick);
        }

        return $imageData;
    }

      /**
     * Уменьшение размеров изображения
     */
    private function reduceDimensions(Imagick $imagick): string
    {
        $width = $imagick->getImageWidth();
        $height = $imagick->getImageHeight();

        $attempts = 0;
        $maxAttempts = 5;
        $reductionFactor = 0.8; // Уменьшаем на 20%

        while ($attempts < $maxAttempts) {
            // Уменьшаем размеры
            $newWidth = max(100, (int) ($width * $reductionFactor));
            $newHeight = max(100, (int) ($height * $reductionFactor));

            // Клонируем и изменяем размер
            $tempImagick = clone $imagick;
            $tempImagick->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 1, false);

            // Сжимаем с минимальным качеством
            $tempImagick->setImageCompressionQuality(30);
            $tempImagick->setOption('webp:method', '4');

            $newData = $tempImagick->getImageBlob();
            $sizeKb = strlen($newData) / 1024;

            $tempImagick->destroy();

            \Log::debug('Reduced to ' . $newWidth . 'x' . $newHeight . ': ' . round($sizeKb, 2) . 'KB');

            if ($sizeKb <= $this->maxSizeKb || $newWidth <= 100) {
                return $newData;
            }

            $width = $newWidth;
            $height = $newHeight;
            $reductionFactor = 0.9; // Далее уменьшаем медленнее
            $attempts++;
        }

        // Если все попытки неудачны, возвращаем максимально сжатое
        return $newData ?? $imagick->getImageBlob();
    }

    /**
     * Обработка изображения
     */
    private function processImage(string $binaryData): Imagick
    {
        $imagick = new Imagick();
        $imagick->readImageBlob($binaryData);

        // Автоповорот (для фото с телефонов)
        $imagick->autoOrient();

        // Получаем исходные размеры
        $originalWidth = $imagick->getImageWidth();
        $originalHeight = $imagick->getImageHeight();

        // Пропорциональное уменьшение с ограничением
        $this->smartResize($imagick, $originalWidth, $originalHeight);

        // Удаляем метаданные (EXIF, ICC профили) для уменьшения размера
        $imagick->stripImage();

        // Конвертируем в sRGB если нужно (для CMYK изображений)
        $this->convertToSRGB($imagick);

        // Устанавливаем формат WebP
        $imagick->setImageFormat('webp');

        // Оптимизация для WebP
        $this->optimizeForWebP($imagick);

        return $imagick;
    }

    /**
     * Оптимизация для WebP формата
     */
    private function optimizeForWebP(Imagick $imagick): void
    {
        // Основное качество
        $imagick->setImageCompressionQuality($this->defaultQuality);

        // Специфичные настройки WebP
        $imagick->setOption('webp:method', '6');           // Качество сжатия (0-6)
        $imagick->setOption('webp:lossless', 'false');     // Использовать lossy сжатие
        $imagick->setOption('webp:alpha-quality', '80');   // Качество альфа-канала
        $imagick->setOption('webp:auto-filter', 'true');   // Автофильтрация
        $imagick->setOption('webp:sharp-yuv', 'true');     // Улучшенное YUV преобразование
        $imagick->setOption('webp:thread-level', '1');     // Многопоточность

        // Для прозрачных изображений
        if ($imagick->getImageAlphaChannel()) {
            $imagick->setOption('webp:alpha-compression', '1'); // Сжатие альфа-канала
            $imagick->setOption('webp:alpha-filtering', '2');   // Фильтрация альфа
        }

        // Устанавливаем плотность пикселей (убираем для уменьшения размера)
        $imagick->setImageResolution(72, 72);
        $imagick->setImageUnits(Imagick::RESOLUTION_PIXELSPERINCH);
    }

    /**
     * Конвертация в sRGB цветовое пространство
     */
    private function convertToSRGB(Imagick $imagick): void
    {
        $colorSpace = $imagick->getImageColorspace();

        if ($colorSpace == Imagick::COLORSPACE_CMYK) {
            // Для CMYK изображений
            $profiles = $imagick->getImageProfiles('*', false);

            // Удаляем CMYK профиль
            if (in_array('icc', $profiles)) {
                $imagick->profileImage('icc', null);
            }

            // Конвертируем в RGB
            $imagick->transformImageColorspace(Imagick::COLORSPACE_SRGB);
        } elseif ($colorSpace == Imagick::COLORSPACE_GRAY) {
            // Для черно-белых изображений
            $imagick->transformImageColorspace(Imagick::COLORSPACE_SRGB);
        }
    }

    /**
     * Умное изменение размера
     */
    private function smartResize(Imagick $imagick, int $originalWidth, int $originalHeight): void
    {
        // Если изображение уже меньше или равно нужному размеру
        if ($originalWidth <= $this->maxWidth && $originalHeight <= $this->maxHeight) {
            // Не изменяем размер, но все равно оптимизируем
            return;
        }

        // Вычисляем новые размеры с сохранением пропорций
        $ratio = $originalWidth / $originalHeight;

        if ($ratio > 1) {
            // Горизонтальное изображение
            $newWidth = $this->maxWidth;
            $newHeight = (int) round($this->maxWidth / $ratio);
        } else {
            // Вертикальное или квадратное изображение
            $newHeight = $this->maxHeight;
            $newWidth = (int) round($this->maxHeight * $ratio);
        }

        // Гарантируем что не превышаем максимальные размеры
        $newWidth = min($newWidth, $this->maxWidth);
        $newHeight = min($newHeight, $this->maxHeight);

        // Изменяем размер с лучшим фильтром
        $imagick->resizeImage(
            $newWidth,
            $newHeight,
            Imagick::FILTER_LANCZOS, // Лучшее качество
            1,                       // Без размытия
            true                    // Указываем точные размеры
        );
    }

    /**
     * Извлекает и декодирует base64 данные
     */
    public function extractAndDecodeBase64(string $media): ?string
    {
        // Удаляем data:image/...;base64, префикс если есть
        if (strpos($media, 'base64,') !== false) {
            $media = explode('base64,', $media)[1];
        }

        $decoded = base64_decode($media, true);

        if ($decoded === false) {
            \Log::warning('Invalid base64 data provided');
            return null;
        }

        return $decoded;
    }

    /**
     * Проверяет валидность изображения
     */
    public function isValidImage(string $binaryData): bool
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_buffer($finfo, $binaryData);
        finfo_close($finfo);

        // Проверяем что это изображение
        if (strpos($mimeType, 'image/') !== 0) {
            \Log::warning('Invalid MIME type: ' . $mimeType);
            return false;
        }

        // Извлекаем расширение
        $extension = explode('/', $mimeType)[1] ?? '';

        // Проверяем расширение
        if (!in_array(strtolower($extension), $this->ImgAllowedExtensions)) {
            \Log::warning('Unsupported image extension: ' . $extension);
            return false;
        }

        // Дополнительная проверка через Imagick
        try {
            $testImagick = new Imagick();
            $testImagick->readImageBlob($binaryData);
            $testImagick->destroy();
            return true;
        } catch (ImagickException $e) {
            \Log::warning('Invalid image data: ' . $e->getMessage());
            return false;
        }
    }
}
