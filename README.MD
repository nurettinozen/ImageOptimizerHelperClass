**English**

The ImageHelper class provides methods for processing images. The main method is `processImage()`, which takes three arguments:

* The URL of the image to be processed
* The new width of the image
* The new height of the image

The `processImage()` method first downloads the image from the specified URL. If the download is successful, the method then creates a new image object from the downloaded data. The method then calculates the new dimensions of the image, taking into account the aspect ratio of the original image. The method then creates a new image object with the specified dimensions and copies the data from the original image to the new image, resizing it as needed. Finally, the method compresses the new image and returns it as a base64-encoded string.

The following is an example of how to use the `processImage()` method:

```php
$imageHelper = new ImageHelper();
$processedImage = $imageHelper->processImage('https://example.com/image.jpg', 100, 100);

// The processed image is now stored in the $processedImage variable.
// You can save it to a file, display it on a web page, or do anything else you want with it.
```

**Turkish**

ImageHelper sınıfı, görüntüleri işlemek için yöntemler sağlar. Ana yöntem `processImage()`, üç argüman alır:

* İşlenecek görüntünün URL'si
* Görüntünün yeni genişliği
* Görüntünün yeni yüksekliği

`processImage()` yöntemi, belirtilen URL'den görüntüyü önce indirir. İndirme başarılı olursa, yöntem indirilen verilerden yeni bir görüntü nesnesi oluşturur. Yöntem daha sonra orijinal görüntünün en boy oranını dikkate alarak görüntünün yeni boyutlarını hesaplar. Yöntem daha sonra belirtilen boyutlara sahip yeni bir görüntü nesnesi oluşturur ve orijinal görüntüden verileri yeni görüntüye kopyalar, gerektiği gibi yeniden boyutlandırır. Son olarak, yöntem yeni görüntüyü sıkıştırır ve base64 kodlu bir dizge olarak döndürür.

`processImage()` yöntemini nasıl kullanacağınıza dair bir örnek:

```php
$imageHelper = new ImageHelper();
$processedImage = $imageHelper->processImage('https://example.com/image.jpg', 100, 100);

// İşlenen görüntü artık $processedImage değişkeninde saklanır.
// Dosyaya kaydedebilir, web sayfasında görüntüleyebilir veya istediğiniz başka bir şey yapabilirsiniz.
```