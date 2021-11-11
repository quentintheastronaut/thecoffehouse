<?php
/*
    controllers/SaleController.php
*/

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Record;

class SaleController extends Controller {
        public function __construct() {}

        public function index()
        {
            $records = Record::getAll();
            $this->setLayout('main');
            return $this->render('sale', [
                'model' => $records 
            ]);
        }

        public function delete(Request $request) {
            if($request->getMethod() === 'post') {
                $recordModel = Record::findOne(['records' => $this->id]);
                $recordModel->delete();
                Application::$app->response->redirect('record');
            } else if ($request->getMethod() === 'get') {
                $recordModel = Record::findOne(['records' => $this->id]);
                $this->setLayout('main');
                return $this->render('record', [
                    'model' => $recordModel
                ]);
            } 
        }
}