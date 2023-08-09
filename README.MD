<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ImageHelper Documentation</title>
</head>
<body>

<h1>ImageHelper Documentation</h1>

<h2>Türkçe</h2>

<p><code>ImageHelper</code>, uzak URL'lerden alınan resimleri boyutlandırma ve sıkıştırma işlemlerini kolaylaştıran bir PHP yardımcı sınıfıdır. GD kütüphanesini kullanarak resimleri işlemek için tasarlanmıştır ve en/boy oranını koruma ve resim kalitesini kontrol etme yöntemleri sunar.</p>

<h3>Kullanım:</h3>

<ol>
    <li><code>ImageHelper</code> sınıfını PHP betiğinizde dahil edin:</li>
</ol>

<pre><code>&lt;?php
require_once('ImageHelper.php');
?&gt;</code></pre>

<ol start="2">
    <li><code>processImage</code> yöntemini kullanmak için aşağıdaki parametreleri belirterek çağırın:
        <ul>
            <li><code>$imageUrl</code>: İşlenecek resmin URL'si.</li>
            <li><code>$newWidth</code>: İşlenen resmin istenen genişliği.</li>
            <li><code>$newHeight</code>: İşlenen resmin istenen yüksekliği.</li>
            <li><code>$quality</code> (isteğe bağlı): Sıkıştırılan resmin kalite seviyesi (varsayılan 80).</li>
        </ul>
    </li>
</ol>

<pre><code>&lt;?php
$imageUrl = 'https://ornek.com/resim.jpg';
$newWidth = 800;
$newHeight = 600;
$quality = 75;

$processedImage = ImageHelper::processImage($imageUrl, $newWidth, $newHeight, $quality);

if ($processedImage) {
    echo '&lt;img src="' . $processedImage . '" alt="İşlenmiş Resim"&gt;';
} else {
    echo 'Resim işleme başarısız oldu.';
}
?&gt;</code></pre>

<h2>Metodlar:</h2>

<ul>
    <li><code>processImage($imageUrl, $newWidth, $newHeight, $quality)</code>: Verilen URL'den resmi işler ve işlenmiş resmin base64 kodlu veri URI'sini döndürür. İsteğe bağlı olarak istenen resim kalitesini belirtebilirsiniz (varsayılan 80).</li>
</ul>

<h3>Not:</h3>
<p><code>imagecreatefromstring</code> ve ilgili işlevlerin çalışabilmesi için sunucunuzda GD kütüphanesinin etkinleştirildiğinden emin olmanız önemlidir.</p>

<hr>

<h2>English</h2>

<p><code>ImageHelper</code> is a PHP helper class that facilitates resizing and compressing images retrieved from remote URLs. It utilizes the GD library to process the images and provides methods to maintain aspect ratio and control the image quality.</p>

<h3>Usage:</h3>

<ol>
    <li>Include the <code>ImageHelper</code> class in your PHP script:</li>
</ol>

<pre><code>&lt;?php
require_once('ImageHelper.php');
?&gt;</code></pre>

<ol start="2">
    <li>To use the <code>processImage</code> method, call it with the following parameters:
        <ul>
            <li><code>$imageUrl</code>: The URL of the image to be processed.</li>
            <li><code>$newWidth</code>: The desired width of the processed image.</li>
            <li><code>$newHeight</code>: The desired height of the processed image.</li>
            <li><code>$quality</code> (optional): The quality level of the compressed image (default is 80).</li>
        </ul>
    </li>
</ol>

<pre><code>&lt;?php
$imageUrl = 'https://example.com/image.jpg';
$newWidth = 800;
$newHeight = 600;
$quality = 75;

$processedImage = ImageHelper::processImage($imageUrl, $newWidth, $newHeight, $quality);

if ($processedImage) {
    echo '&lt;img src="' . $processedImage . '" alt="Processed Image"&gt;';
} else {
    echo 'Image processing failed.';
}
?&gt;</code></pre>

<h2>Methods:</h2>

<ul>
    <li><code>processImage($imageUrl, $newWidth, $newHeight, $quality)</code>: Processes the image from the given URL and returns the base64-encoded data URI of the processed image. Optionally, specify the desired image quality (default is 80).</li>
</ul>

<h3>Note:</h3>
<p>It's important to ensure that the GD library is enabled on your server for the <code>imagecreatefromstring</code> and related functions to work.</p>

</body>
</html>
