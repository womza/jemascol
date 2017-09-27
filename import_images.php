<?php
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
error_reporting( E_ALL );

$magentoRootDir = getcwd();
require $magentoRootDir . '/app/bootstrap.php';
require $magentoRootDir . '/app/Mage.php';
header('Content-type: text/plain; charset=UTF-8');

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

// read directory
$importDir = Mage::getBaseDir('media') . DS . 'bulk_products';
$files = scandir($importDir);
$images = [];
if (!empty($files) && $files[0] = '.') {
    unset($files[0], $files[1]);
    $images = array_map(function($file) {
        return mb_convert_encoding(trim($file), "UTF-8", "iso-8859-1");
    }, $files);
}

$i = 0;
$handle = fopen('jemascol.csv', 'r');
while (($data = fgetcsv($handle)) !== FALSE) {
    // not read the first row
    if ($i++ == 0) {
        continue;
    }
    
    // parse each row
    $row_text = mb_convert_encoding($data[0], "UTF-8", "iso-8859-1");
    $row = explode(';', $row_text);
    $prod = array_map(function($r) {
        return trim($r);
    }, $row);

    $sku = (string)$prod[0];
    if (strlen($sku) == 1) {
        $sku = "00{$sku}";
    } elseif (strlen($sku) == 2) {
        $sku = "0{$sku}";
    }
    $product_image = isset($prod[11]) ? $prod[11] : '';
    
    if (!empty($product_image)) {
        foreach ($images as $image) {
            if (preg_match('/'.$product_image.'/i', $image)) {
                $file_path = $importDir . DS . $image;
                if (file_exists($file_path)) {
                    $product = Mage::getModel("catalog/product")->loadByAttribute('sku', $sku);
                    $product->addImageToMediaGallery($file_path, array('image', 'small_image', 'thumbnail'), false, false);
                    //$product->save();
                } else {
                    print "sku: {$sku} --- image: {$file_path}" . "\r\n";
                }
            }
        }
    }
}
fclose($handle);
echo 'Updated images products.';
