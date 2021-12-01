<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

use app\models\User;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {

        if (Application::isGuest()) {
            Application::$app->response->redirect('/login');
        }

        $updateSuccess = false;
        $id = Application::$app->user->id;
        $user = User::getUserInfo($id);
        if ($request->getMethod() === 'post') {
            $user->loadData($request->getBody());
            if ($user->validateUpdateProfile() && true) {
                if ($user->updateProfile($user)) {
                    $updateSuccess = true;
                }
            }
        }

        $user = User::getUserInfo($id);
        Application::$app->user = $user;

        return $this->render('profile', [
            'user' => $user,
            'updateSuccess' => $updateSuccess,
        ]);
    }
}