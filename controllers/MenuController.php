<?php

namespace app\controllers;

use app\controllers\SiteController;
use app\models\Product;

class MenuController extends SiteController
{

    public function menu()
    {
        $products = Product::getAllProducts();
        $data = array('products' => $products);
        return $this->render('menu', $data);
    }
}