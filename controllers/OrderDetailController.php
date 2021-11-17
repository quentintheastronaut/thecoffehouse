<?php
/*
    controllers/category/index.php
*/

namespace app\controllers;

use app\core\Controller;
use app\core\Application;

class OrderDetailController extends Controller
{
    public function orderDetail()
    {
        $user = Application::$app->user;
        return $this->render('order_detail', [
            'user' => $user
        ]);
    }
}