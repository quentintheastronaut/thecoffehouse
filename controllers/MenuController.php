<?php

namespace app\controllers;

use app\controllers\SiteController;
use app\models\Product;

class MenuController extends SiteController
{

    // Của Quân, đã chạy được, xin đừng xóa
    public function menu()
    {
        $products = Product::getAllProducts();
        $data = array('products' => $products);
        return $this->render('menu', $data);
    }
}