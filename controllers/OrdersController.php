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

<<<<<<< HEAD


    public function checkoutConfirm()
    {
        $userId = Application::$app->user->id;
        $cart_id = Application::$app->cart->id;
        $cartItem = CartItem::getCartItem($cart_id);
        foreach ($cartItem as $item) {
            $record = new Record(
                $userId,
                $item->product_id,
                $item->size,
                $item->quantity,
            );
            $record->save();
        }
        Application::$app->session->setFlash('Success', 'Cảm ơn quý khách đã mua hàng');
        Application::$app->response->redirect('/orders');
        return 'Show success page';
    }
=======
>>>>>>> 6a0c4e59a4ddfbd44710cc0b6dc04c691355b2dc
}