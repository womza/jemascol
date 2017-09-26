<?php
ini_set('display_errors', 1);
ini_set('max_execution_time', 680);
error_reporting( E_ALL );

$magentoRootDir = getcwd();
require $magentoRootDir . '/app/bootstrap.php';
require $magentoRootDir . '/app/Mage.php';
header('Content-type: text/plain; charset=UTF-8');

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
// Gets the current store's id
$storeId = Mage::app()->getStore()->getStoreId();
// Gets the current website's id
$websiteId = Mage::app()->getStore()->getWebsiteId();

// get country code
$country_code = 'CO';

// get tax id
$tax_id = 2;

// Qty.
$qty = 100;

// get all categories
$categories = [];
$root_cat = Mage::getModel('catalog/category')->load(2);
$cats = explode(',', $root_cat->getChildren());
foreach ($cats as $cat) {
    $categories[$cat] = [
        'category' => '',
        'children' => [],
    ];
}
foreach ($categories as $cat => $data) {
    $_category = Mage::getModel('catalog/category')->load($cat);
    $categories[$cat]['category'] = $_category->getName();
    $subcats = explode(',', $_category->getChildren());
    sort($subcats);
    foreach ($subcats as $sub) {
        $sub_category = Mage::getModel('catalog/category')->load($sub);
        $categories[$cat]['children'][$sub] = $sub_category->getName();
    }
}

$attribute = Mage::getModel('eav/entity_attribute')
    ->loadByCode('catalog_product', 'manufacturer');

$valuesCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
    ->setAttributeFilter($attribute->getData('attribute_id'))
    ->setStoreFilter(0, false);

$preparedManufacturers = array();            
foreach($valuesCollection as $value) {
    $preparedManufacturers[$value->getOptionId()] = $value->getValue();
}
//print_r($preparedManufacturers);


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

    // format price
    $product_price = (float)str_replace('$ ', '', $prod[2]);

    // category and subcategory 4 and 5
    $category = [];
    foreach ($categories as $cat_id => $cat) {
        if ($prod[4] == 'MANOS Y UÑAS') {
            if (stripos($cat['category'], 'Manos y') !== false) {
                $category[] = $cat_id;
            }
        } else {
            if (stripos($cat['category'], $prod[4]) !== false) {
                $category[] = $cat_id;
            }
        }
    }
    foreach ($categories[current($category)]['children'] as $cat_id => $cat) {
        if (stripos($cat, $prod[5]) !== false) {
            $category[] = $cat_id;
        }
    }

    // get manufacture
    $manufacturer_id = 14;
    foreach ($preparedManufacturers as $optionId => $value) {
        if (stripos($value, $prod[3]) !== false) {
            $manufacturer_id = $optionId;
        }
    }

    $sku = $prod[0];
    $product_name = $prod[1];
    $product_description = $prod[7];
    $product_short_description = $prod[6];
    $product_meta_title = $product_name;
    $product_meta_keyword = '';
    $product_meta_description = isset($prod[8]) ? $prod[8] : '';
    if (empty($product_description)) {
        $product_description = $product_short_description;
    }

    $product = Mage::getModel("catalog/product");
    $product->setStoreId($storeId) 
        ->setWebsiteIds(array($websiteId)) 
        ->setAttributeSetId(4) 
        ->setTypeId('simple') 
        ->setCreatedAt(strtotime('now')) 
        ->setSku($sku)
        ->setName($product_name)
        ->setWeight(0.0001)
        ->setStatus(1)
        ->setTaxClassId($tax_id)
        ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
        ->setManufacturer($manufacturer_id)
        ->setCountryOfManufacture($country_code)            
        ->setPrice($product_price)       
        ->setMetaTitle($product_meta_title)
        ->setMetaKeyword($product_meta_keyword)
        ->setMetaDescription($product_meta_description)            
        ->setDescription($product_description)
        ->setShortDescription($product_short_description)
        ->setStockData(array('is_in_stock' => 1, 'qty' => $qty))
        ->setCategoryIds($category);
    //$product->save();
}
fclose($handle);
echo 'Import product from CSV file, uncomment $product->save() to save products.';
