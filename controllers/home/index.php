<!--
    controllers/home/index.php
-->
<?php
$options_hotproduct = array(
    'where' => 'product_type = 1',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$hot_products = get_all('products', $options_hotproduct);
$options_newproduct = array(
    'where' => 'product_type = 2',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$new_products = get_all('products', $options_newproduct);
$options_saleproduct = array(
    'where' => 'product_type = 3',
    'limit' => '12',
    'offset' => '0',
    'order_by' => 'createDate DESC'
);
$saleoff_products = get_all('products', $options_saleproduct);
$title = 'Home page';
$option_slide = array(
    'order_by' => 'id asc'
);
$slides = get_all('slides', $option_slide);
foreach ($slides as $action) {
    if ($action['status'] == 1) $idslide = $action['id'];
}
if (isset($idslide)) {
    $slide = get_a_record('slides', $idslide);
}
require('views/home/index.php');
