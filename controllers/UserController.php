<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Input;
use app\core\Application;
use app\core\Request;
use app\core\Session;
use app\models\User;

class UserController extends Controller{
    public function __construct() {}

    public function index() 
    {
        return $this->render('user');
    }

    public function create(Request $request)
    {
        $userID = Application::$app->session->get('user');
        $userModel = User::getUserInfo($userID);
        if($userModel->getRole() === 'admin') {
            $registerModel = new User;
            if($request->getMethod() === 'post') {
                $registerModel->loadData($request->getBody());
                if($registerModel->validate() && $registerModel->save()) {
                    Application::$app->session->setFlash('success', 'Successful');
                    Application::$app->response->redirect('users'); 
                }
            } else if($request->getMethod() === 'get') {
                $users = User::getAllUsers();
                $this->setLayout('dashboard');
                return $this->render('users', [
                    'model' => $users
                ]);
            }
        }
    }

    public function delete(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $userModel = user::getUserInfo($id);
            $userModel->delete();
            return Application::$app->response->redirect('products');
        } else if($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $userModel = user::getUserInfo($id);
            $this->setLayout('main');
            return $this->render('user', [
                'model' => $userModel
            ]);
        }        
    }

    public function update(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = $_REQUEST('id');
            $userModel = User::getUserInfo($id);
            $userModel->loadData($request->getBody());
            $userModel->updateProfile($userModel);
            Application::$app->response->redirect('products');
        } else if ($request->getMethod() === 'get') {
            $id = (int)$_REQUEST['id'];
            $userModel = User::getUserInfo($id);
            $this->setLayout('main');
            return $this->render('user', [
                'model' => $userModel
            ]);
        }        
    }

    public function view(Request $request)
    {
        if($request->getMethod() === 'p')
        $id = (int)$_REQUEST['id'];
        $userModel = User::getUserInfo($id);
        $this->setLayout('main');
        return $this->render('user', [
            'model' => $userModel
        ]);         
    }
}