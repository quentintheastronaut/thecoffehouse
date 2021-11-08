<?php
/*
    controllers/category/index.php
*/
namespace app\controllers;
namespace app\models;
use app\core\Controller;
use app\core\Input;
use app\core\Response;
use app\core\Session;
use app\models\Cart;
use app\core\Application;

    class CartController extends Controller {
        public function __construct()
        {
            parent::__construct();
        }

        public function index() 
        {
            return $this->render('cart');    
        }

        public function info()
        {
            $cart_id = Input::get('cart_id');
		    $CartModel = new Cart;
		    $cart_infor = $CartModel->findById($cart_id);
		    return $this->jsonResponse($cart_infor);
        }

        public function insert() 
        {
            $CartModel = new Cart;
            $CartModel->id = uniqid();
            $CartModel->cart_name = Input::get('cart_name'); 
            $CartModel->create_at = date("d-m-Y",time());
            $CartModel->validate();
            if ($CartModel->validate() && $CartModel->save()) {
                Application::$app->session->setFlash('Success', 'System`s added new product');
                Application::$app->response->redirect('product');
            }   
        }

        public function remove()
        {
            $cart_id = Input::get('cart_id');
            $CartModel = new Cart;
            if($CartModel->delete($cart_id)) {
                Session::set('Success', 'Product has id ' . $cart_id . ' has been deleted.');
                Response::redirect('cart');
            }
        }

        public function update()
        {
            
        }
    }


