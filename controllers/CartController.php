<?php

class CartController extends CartModel {
    public function index() {
        if (!empty($_POST)) {
            foreach ($_POST['number'] as $product_id => $number) {
                cart_update($product_id, $number);
                global $user_nav;
                if (isset($user_nav)) update_cart_user_db();
            }
            header('location:index.php?controller=cart');
        }
        $title = 'Cart';
        $cart = cart_list();
        require('views/cart/index.php');
    }

    public function add() {
        if (isset($_GET['id'])) {
            $product_id = intval($_GET['id']);
        }
        $option_slug_product = array(
            'select' => 'slug',
            'where' => 'id=' . $product_id
        );
        $product_slugs = get_all('products', $option_slug_product);
        foreach ($product_slugs as $slug) {
            $product_slug = $slug['slug'];
        }
        if (!empty($_POST)) {
            $product = array(
                'number' => intval($_POST['number_cart'])
            );
            cart_add($product_id, $product['number']);
            global $user_nav;
            if (isset($user_nav)) update_cart_user_db();
        }
        echo $product_id;
        header('location:../../product/' . $product_id . '-' . $product_slug);
    }

    public function delete() {
        if (isset($_GET['id'])) $product_id = intval($_GET['id']);
        cart_delete($product_id);
        global $user_nav;
        if (isset($user_nav)) delete_cart_user_db($product_id);
        header('location:' . PATH_URL . 'cart');
    }

    public function order() {
        $title = 'Order';
        $cart = cart_list();
        if (empty($cart)) {
            header('location:.');
        }
        global $user_nav;
        if (isset($user_nav)) $user_login = get_a_record('users', $user_nav);
        require('views/cart/order.php');
    }

    public function checkout() {
        if (!empty($_POST)) {
            $order = array(
                'id' => 0,
                'customer_id' => intval($_POST['customer_id']),
                'address' => escape($_POST['address']),
                'cart_total' => $_POST['cart_total'],
                'message' => escape($_POST['message']),
                'create_at' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
            );
            $order_id = save('orders', $order);

            $cart = cart_list();
            //Get item in session cart
            foreach ($cart as $product) {
                $order_detail = array(
                    'id' => 0,
                    'order_id' => $order_id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price']
                );
                save('order_detail', $order_detail);
            }
            cart_destroy(); //delete cart after save order in db
            global $user_nav;
            if (isset($user_nav)) detroy_cart_user_db(); //delete cart synchronously on db after order
            $title = 'Order Success';
            header("refresh:15;url=" . PATH_URL . "home");
            echo '<div style="text-align: center;padding: 20px 10px;">Order Success</div><div style="text-align: center;padding: 20px 10px;">Thank you for ordering from our store.<br>
                    The browser will automatically return to the homepage after 15 seconds, or you can click <a href="' . PATH_URL . 'home">Click here</a>.</div>';
        } else {
            header('location:.');
        }
    }

    public function destroy() {
        cart_destroy();
        if (isset($user_nav)) detroy_cart_user_db();
        header('location:' . PATH_URL . 'cart');
    }
}