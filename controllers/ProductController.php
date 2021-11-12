<?php
/*
    controllers/product.php
*/

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\core\Input;
use app\core\Application;
use app\core\Request;
use app\core\Session;
use app\core\CartSession;
use app\models\Cart;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $products = Product::getAllProducts();
        $this->setLayout('main');
        return $this->render('product', [
            'model' => $products
        ]);
    }

    public function create(Request $request)
    {
        $productModel = new Product();
        if ($request->getMethod() === 'post') {
            $productModel->loadData($request->getBody());
            $productModel->save();
            Application::$app->response->redirect('products');
        } else if ($request->getMethod() == 'get') {
            $products = Product::getAllProducts();
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $products
            ]);
        }
    }

    public function remove(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $productModel = Product::getProductDetail($id);
            $productModel->delete();
            return Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    public function delete(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $productModel = Product::getProductDetail($id);
            $productModel->delete();
            return Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }


    public function update(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $productModel = Product::getProductDetail($id);
            $productModel->loadData($request->getBody());
            $productModel->update();
            Application::$app->response->redirect('products');
        } else if ($request->getMethod() == 'get') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    public function Buy(Request $request)
    {
        if ($request->getMethod() === 'post') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $cart = null;
            if (CartSession::Exists()) {
                $cart = CartSession::Get();
                array_push($cart->products, $productModel);
            } else {
                $cart = new Cart();
                array_push($cart->products, $productModel);
            }
            CartSession::Store($cart);
        } else if ($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
        CartSession::Store($cart);
    }

    public function view(Request $request)
    {
        if ($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $productModel = Product::getProductDetail($id);
            $this->setLayout('main');
            return $this->render('product', [
                'model' => $productModel
            ]);
        }
    }

    // Của Quân, đã chạy được, xin đừng xóa
    public function product($id)
    {
        $id = Application::$app->request->getParam();
        $product = Product::getProductDetail($id);
        $data = array('product' => $product);
        return $this->render('product_detail', $data);
    }
}