<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard()
    {
        $this->setLayout('admin');
        return $this->render('dashboard');
    }

    public function products()
    {
        return $this->render('products');
    }

    public function users()
    {
        return $this->render('users');
    }

    public function stores()
    {
        return $this->render('stores');
    }

    public function sales()
    {
        return $this->render('sales');
    }
}