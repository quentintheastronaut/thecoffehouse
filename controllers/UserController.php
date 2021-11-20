<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;
use app\models\User;

class UserController extends Controller{
    public function __construct() {}

    public function index() 
    {
        $users = User::getAllUsers();
        $this->setLayout('admin');
        return $this->render('/admin/users/users', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $userModel = new User;
        if($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());
            if($userModel->getRole() === 'admin') {
                $userModel->saveAdmin();
            }
            else $userModel->save();
            Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $this->setLayout('admin');
            return $this->render('/admin/users/create_user',  [
                'userModel' => $userModel
            ]);
        }
    }

    public function delete(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $userModel->delete();
            return Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $this->setLayout('admin');
            return $this->render('/admin/users/delete_user', [
                'userModel' => $userModel
            ]);
        }        
    }

    public function update(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $userModel->loadData($request->getBody());
            $userModel->update($userModel);
            Application::$app->response->redirect('/admin/users');
        } else if ($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $this->setLayout('admin');
            return $this->render('/admin/users/edit_user', [
                'userModel' => $userModel
            ]);
        }        
    }

    public function details(Request $request)
    {
        if($request->getMethod() === 'get')
        $id = Application::$app->request->getParam('id');
        $userModel = User::getUserInfo($id);
        $this->setLayout('admin');
        return $this->render('/admin/users/details_user', [
            'userModel' => $userModel
        ]);         
    }
}