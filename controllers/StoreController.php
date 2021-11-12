<?php
/*
    controllers/store.php
*/

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Store;

class StoreController extends Controller {
        public function __construct() {}

        public function index()
        {
            return $this->render('store');
        }

        public function add(Request $request)
        {
            $storeModel = new Store;
            if($request->getMethod() === 'post') {
                $storeModel->loadData($request->getBody());
                $storeModel->save();
                Application::$app->response->redirect('store');
            } else if($request->getMethod() === 'get') {
                $stores = Store::getAll();
                $this->setLayout('main');
                return $this->render('store',  [
                    'model' => $stores
                ]);
            }

        }

        public function delete(Request $request)
        {
            if ($request->getMethod() === 'post') {
                $id = $_REQUEST('id');
                $storeModel = Store::get($id);
                $storeModel->delete();
                return Application::$app->response->redirect('products');
            } else if ($request->getMethod() === 'get') {
                $id = (int)$_REQUEST['id'];
                $storeModel = Store::get($id);
                $this->setLayout('main');
                return $this->render('product', [
                    'model' => $storeModel
                ]);
            }
        }

        public function update(Request $request)
        {   
            if ($request->getMethod() === 'post') {
                $id = $_REQUEST('id');
                $storeModel = Store::get($id);
                $storeModel->loadData($request->getBody());
                $storeModel->update();
                Application::$app->response->redirect('products');
            } else if ($request->getMethod() === 'get') {
                $id = (int)$_REQUEST['id'];
                $storeModel = Store::get($id);
                $this->setLayout('main');
                return $this->render('store', [
                    'model' => $storeModel
                ]);
            }                                                                                                                                                 
        }
}