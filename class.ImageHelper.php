<?php
/**
 * Image Helper Class
 *
 * This class provides methods for processing and compressing images.
 * It uses the GD library and cURL for image manipulation and downloading.
 *
 * @category   Helpers
 * @package    ImageHelper
 * @version    1.0.0
 * @author     Nurettin ÖZEN
 * @license    GNU GENERAL PUBLIC LICENSE
 * @link       https://github.com/nurettinozen/ImageOptimizerHelperClass
 */
class ImageHelper
{
    public static function processImage($imageUrl, $newWidth, $newHeight, $quality = 80)
    {
        $cacheDir = 'cache'; // Cache klasörü adı
        $cacheFileName = md5($imageUrl . $newWidth . $newHeight . $quality) . '.jpg';
        $cacheFilePath = $cacheDir . '/' . $cacheFileName;

        if (file_exists($cacheFilePath)) {
            // Cache'de sıkıştırılmış görüntü varsa direkt olarak döndür
            return 'data:image/jpeg;base64,' . base64_encode(file_get_contents($cacheFilePath));
        }

        $imageData = self::downloadImage($imageUrl);

        if ($imageData) {
            $image = imagecreatefromstring($imageData);

            if ($image !== false) {
                $originalWidth = imagesx($image);
                $originalHeight = imagesy($image);

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

                // Sıkıştırılmış görüntüyü cache'e kaydet
                if (!is_dir($cacheDir)) {
                    mkdir($cacheDir);
                }
                file_put_contents($cacheFilePath, $compressedImage);

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
