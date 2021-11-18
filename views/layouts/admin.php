<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devius Template</title>

    <link rel="stylesheet" href="/css/admin/bootstrap.css">
    <link rel="stylesheet" href="/css/admin/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/css/admin/font-awesome.css">
    <link rel="stylesheet" href="/css/admin/dt-sidebar.css">
    <link rel="stylesheet" href="/css/admin/dt-gradients.css">
    <link rel="stylesheet" href="/css/admin/dt-theme.css">
    <link rel="stylesheet" href="/css/admin/dt-styles.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 

    <script src="/js/admin/jquery-3.2.1.js"></script>
    <script src="/js/admin/bootstrap.min.js"></script>
    <script src="/js/admin/jquery.dataTables.js"></script>
    <script src="/js/admin/dataTables.bootstrap.js"></script>
    <script src="/js/admin/underscore.js"></script>

</head>
<?php

use app\core\Application;
use app\models\User;

$isGuest = Application::$app->isGuest();
$userID = Application::$app->session->get('user');
$userModel = User::get($userID);
?>
<body>
  <div id="wrapper" class="toggled">
    <div id="sidebar-wrapper" class="harmonic">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#">
            Hello, <?= $userModel->getDisplayName() ?>!
          </a>
        </li>
          <li>
            <a href="/admin"?>
              <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;Trang chính
            </a>
          </li>
          <li>
            <a href="/admin%c=products"?>
              <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp;Quản lý sản phẩm
            </a>
          </li>
          <li>
            <a href="/admin%c=categories">
              <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Quản lý các mục
            </a>
          </li>
          <li>
            <a href="/admin%c=users">
              <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Quản lý người dùng
            </a>
          </li>
          <li>
            <a href="/admin%c=sales">
              <i class="fa fa-history" aria-hidden="true"></i>&nbsp;Quản lý bán hàng
            </a>
          </li>
          <li>
            <a href="/admin%c=manageStores">
              <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Quản lý cửa hàng
            </a>
          </li>
          <li>
            <a href="/admin%c=users&a=details?id=<?=($userModel)->getId()?>">
              <i class="fa fa-building" aria-hidden="true"></i>&nbsp;Tài khoản của tôi
            </a>
          </li>
      </ul>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button 
            type="button" 
            class="navbar-toggle collapsed" 
            data-toggle="collapse" 
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="navbar-brand" href="/">The Kaffeehouse</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          {{content}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/admin/simple-sidebar.js"></script>
  <script src="/js/admin/plugins.js"></script>
  
</body>

</html>