<?php
/*
    controllers/category/index.php
*/

namespace app\controllers;

use app\core\Controller;
use app\core\Input;
use app\core\Response;
use app\core\Session;
use app\core\Application;
use app\core\CartSession;
use app\core\Database;
use app\models\Cart;
use app\models\CartItem;
use app\models\Product;
use app\models\Order;
use app\models\Record;

class OrdersController extends Controller
{
    public function orders()
    {
        $userId = Application::$app->user->id;
        $orders = Order::getOrders($userId);

        return $this->render('orders', [
            'orders' => $orders,
        ]);
    }
}