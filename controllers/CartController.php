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
use app\models\CartDetail;
use app\models\CartItem;
use app\models\Order;

class CartController extends Controller
{
    public function cart()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'delete') {
                if (isset($_GET['product_id']) && isset($_GET['cart_id'])) {
                    $product_id = Application::$app->request->getParam('product_id');
                    $cart_id = Application::$app->request->getParam('cart_id');
                    $this->delete($product_id, $cart_id);
                }
            }
            if ($_GET['action'] == 'update') {
            }
        }


        $user = Application::$app->user;
        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);

        return $this->render('cart', [
            'items' => $items,
            'user' => $user
        ]);
    }

    public function delete($product_id, $cart_id)
    {
        CartItem::deleteItem($product_id, $cart_id);
    }

    public function createOrder($customer_id, $payment_method)
    {
        $order = Order::create($customer_id, $payment_method);
    }

    public function placeOrder()
    {

        $body = Application::$app->request->getBody();
        $user = Application::$app->user;


        $payment_method = $body['payment_method'];
        $customer_id = $user->id;

        $this->createOrder($customer_id, $payment_method);

        $cart_id = Application::$app->cart->id;
        $items = CartItem::getCartItem($cart_id);



        return $this->render('cart', [
            'items' => $items,
            'user' => $user
        ]);
    }
}