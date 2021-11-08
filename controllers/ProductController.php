<?php
/*
    controllers/product.php
*/

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\core\Input;
use app\core\Application;
use app\core\Session;

class ProductController extends Controller {
        public function __construct()
        {
            parent::__construct();
        }

        public function index() 
        {
            return $this->render('product');    
        }

        public function add() 
        {
            $ProductModel = new Product;
            $ProductModel->id = uniqid();
            $ProductModel->category_id = Input::get('category_id');
            $ProductModel->name = Input::get('name'); 
            $ProductModel->price =  Input::get('price');
            $ProductModel->description = Input::get('description');
            $ProductModel->create_at = date("d-m-Y",time());
            $ProductModel->validate();
            if ($ProductModel->validate() && $ProductModel->save()) {
                Application::$app->session->setFlash('success', 'System`s added new category');
                Application::$app->response->redirect('category');
            }              
        }

        public function remove()
        {
            $product_id = Input::get('product_id');
            $ProductModel = new Product;
            if($ProductModel->delete($product_id)) {
                Session::set('Success', 'Product has id ' . $product_id . ' has been deleted.');
                Application::$app->response->redirect('Product');
            }
        }

        public function update()
        {

        }
    }