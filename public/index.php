<?php

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\AboutController;
use app\controllers\ProductController;
use app\controllers\MenuController;
use app\controllers\ProfileController;
use app\controllers\AdminController;
use app\controllers\StoreController;
use app\controllers\UserController;
use app\controllers\CategoryController;
use app\controllers\SaleController;
use app\controllers\CartController;
use app\controllers\SaleController;
use app\controllers\UserController;
use app\controllers\StoreController;
use app\controllers\CategoryController;
use app\controllers\OrdersController;
use app\controllers\OrderDetailController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/stores', [StoreController::class, 'stores']);
$app->router->get('/menu', [MenuController::class, 'menu']);
$app->router->post('/menu', [MenuController::class, 'search']);
$app->router->get('/collection', [SiteController::class, 'collection']);
$app->router->get('/profile', [ProfileController::class, 'profile']);
$app->router->post('/profile', [ProfileController::class, 'profile']);
$app->router->get('/stores', [SiteController::class, 'stores']);

$app->router->get('/product', [ProductController::class, 'product']);
$app->router->post('/product', [ProductController::class, 'product']);

$app->router->get('/cart', [CartController::class, 'cart']);
$app->router->post('/cart', [CartController::class, 'placeOrder']);

$app->router->get('/orders', [OrdersController::class, 'orders']);

$app->router->get('/order', [OrderDetailController::class, 'orderDetail']);


// Admin nè Long, bắt trước rồi làm theo, mà nhớ xem kỹ giùm anh nha em
<<<<<<< HEAD
$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
// admin general
$app->router->get('/admin', [AdminController::class, 'index']);
$app->router->get('/admin%c=sales', [SaleController::class, 'index']);
$app->router->get('/admin%c=users', [UserController::class, 'index']);
$app->router->get('/admin%c=products', [ProductController::class, 'index']);
$app->router->get('/admin%c=stores', [StoreController::class, 'stores']);
$app->router->get('/admin%c=categories', [CategoryController::class, 'index']);
$app->router->get('/admin%c=manageStores', [StoreController::class, 'index']);
$app->router->get('/admin%c=users', [UserController::class, 'index']);
// product
$app->router->get('/admin%c=products&a=delete', [ProductController::class, 'delete']);
$app->router->get('/admin%c=products&a=edit', [ProductController::class, 'update']);
$app->router->get('/admin%c=products&a=create', [ProductController::class, 'create']);
$app->router->get('/admin%c=products&a=details', [ProductController::class, 'details']);
=======
// admin general
$app->router->get('/admin', [AdminController::class, 'index']);
$app->router->get('/admin/sales', [SaleController::class, 'index']);
$app->router->get('/admin/users', [UserController::class, 'index']);
$app->router->get('/admin/products', [ProductController::class, 'index']);
$app->router->get('/admin/stores', [StoreController::class, 'index']);
$app->router->get('/admin/categories', [CategoryController::class, 'index']);
$app->router->get('/admin/stores', [StoreController::class, 'index']);
$app->router->get('/admin/users', [UserController::class, 'index']);
$app->router->get('/admin/profile', [AdminController::class, 'profile']);
$app->router->post('/admin/profile', [AdminController::class, 'profile']);
// product
$app->router->get('/admin/products/delete', [ProductController::class, 'delete']);
$app->router->get('/admin/products/edit', [ProductController::class, 'update']);
$app->router->get('/admin/products/create', [ProductController::class, 'create']);
$app->router->get('/admin/products/details', [ProductController::class, 'details']);

$app->router->post('/admin/products/delete', [ProductController::class, 'delete']);
$app->router->post('/admin/products/edit', [ProductController::class, 'update']);
$app->router->post('/admin/products/create', [ProductController::class, 'create']);
$app->router->post('/admin/products/details', [ProductController::class, 'details']);
// category
$app->router->get('/admin/categories/delete', [CategoryController::class, 'delete']);
$app->router->get('/admin/categories/edit', [CategoryController::class, 'update']);
$app->router->get('/admin/categories/create', [CategoryController::class, 'create']);
$app->router->get('/admin/categories/details', [CategoryController::class, 'details']);
    
$app->router->post('/admin/categories/delete', [CategoryController::class, 'delete']);
$app->router->post('/admin/categories/edit', [CategoryController::class, 'update']);
$app->router->post('/admin/categories/create', [CategoryController::class, 'create']);
$app->router->post('/admin/categories/details', [CategoryController::class, 'details']);
// store
$app->router->get('/admin/stores/delete', [StoreController::class, 'delete']);
$app->router->get('/admin/stores/edit', [StoreController::class, 'update']);
$app->router->get('/admin/stores/add', [StoreController::class, 'add']);
$app->router->get('/admin/stores/details', [StoreController::class, 'details']);

$app->router->post('/admin/stores/delete', [StoreController::class, 'delete']);
$app->router->post('/admin/stores/edit', [StoreController::class, 'update']);
$app->router->post('/admin/stores/add', [StoreController::class, 'add']);
$app->router->post('/admin/stores/details', [StoreController::class, 'details']);
// user
$app->router->get('/admin/users/delete', [UserController::class, 'delete']);
$app->router->get('/admin/users/edit', [UserController::class, 'update']);
$app->router->get('/admin/users/create', [UserController::class, 'create']);
$app->router->get('/admin/users/details', [UserController::class, 'details']);

$app->router->post('/admin/users/delete', [UserController::class, 'delete']);
$app->router->post('/admin/users/edit', [UserController::class, 'update']);
$app->router->post('/admin/users/create', [UserController::class, 'create']);
$app->router->post('/admin/users/details', [UserController::class, 'details']);
>>>>>>> master

$app->router->post('/admin%c=products&a=delete', [ProductController::class, 'delete']);
$app->router->post('/admin%c=products&a=edit', [ProductController::class, 'update']);
$app->router->post('/admin%c=products&a=create', [ProductController::class, 'create']);
$app->router->post('/admin%c=products&a=details', [ProductController::class, 'details']);
// category
$app->router->get('/admin%c=categories&a=delete', [CategoryController::class, 'delete']);
$app->router->get('/admin%c=categories&a=edit', [CategoryController::class, 'update']);
$app->router->get('/admin%c=categories&a=create', [CategoryController::class, 'create']);
$app->router->get('/admin%c=categories&a=details', [CategoryController::class, 'details']);
    
$app->router->post('/admin%c=categories&a=delete', [CategoryController::class, 'delete']);
$app->router->post('/admin%c=categories&a=edit', [CategoryController::class, 'update']);
$app->router->post('/admin%c=categories&a=create', [CategoryController::class, 'create']);
$app->router->post('/admin%c=categories&a=details', [CategoryController::class, 'details']);
// store
$app->router->get('/admin%c=manageStores&a=delete', [StoreController::class, 'delete']);
$app->router->get('/admin%c=manageStores&a=edit', [StoreController::class, 'update']);
$app->router->get('/admin%c=manageStores&a=add', [StoreController::class, 'add']);
$app->router->get('/admin%c=manageStores&a=details', [StoreController::class, 'details']);

$app->router->post('/admin%c=manageStores&a=delete', [StoreController::class, 'delete']);
$app->router->post('/admin%c=manageStores&a=edit', [StoreController::class, 'update']);
$app->router->post('/admin%c=manageStores&a=add', [StoreController::class, 'add']);
$app->router->post('/admin%c=manageStores&a=details', [StoreController::class, 'details']);
// user
$app->router->get('/admin%c=users&a=delete', [UserController::class, 'delete']);
$app->router->get('/admin%c=users&a=edit', [UserController::class, 'update']);
$app->router->get('/admin%c=users&a=create', [UserController::class, 'create']);
$app->router->get('/admin%c=users&a=details', [UserController::class, 'details']);

$app->router->post('/admin%c=users&a=delete', [UserController::class, 'delete']);
$app->router->post('/admin%c=users&a=edit', [UserController::class, 'update']);
$app->router->post('/admin%c=users&a=create', [UserController::class, 'create']);
$app->router->post('/admin%c=users&a=details', [UserController::class, 'details']);
$app->run();