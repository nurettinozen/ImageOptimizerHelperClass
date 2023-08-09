<?php

class ImageHelper
{
    public static function processImage($imageUrl, $newWidth, $newHeight, $quality = 80)
    {
        $imageData = self::downloadImage($imageUrl);

        if ($imageData) {
            $image = imagecreatefromstring($imageData);

            if ($image !== false) {
                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);

                // Yeni boyutları hesapla ve aspect ratio'yu koru
                $aspectRatio = $originalWidth / $originalHeight;
                if ($newWidth / $newHeight > $aspectRatio) {
                    $newWidth = $newHeight * $aspectRatio;
                } else {
                    $newHeight = $newWidth / $aspectRatio;
                }

                $newImage = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

                ob_start();
                imagejpeg($newImage, null, $quality);
                $compressedImage = ob_get_contents();
                ob_end_clean();

                imagedestroy($newImage);
                imagedestroy($image);

                return 'data:image/jpeg;base64,' . base64_encode($compressedImage);
            }
        }

        return null;
    }

    private static function downloadImage($imageUrl)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $imageUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $imageData = curl_exec($ch);

        curl_close($ch);

        return $imageData;
    }
}
