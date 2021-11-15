<?php

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\AboutController;
use app\controllers\ProductController;
use app\controllers\MenuController;
use app\controllers\ProfileController;
use app\controllers\AdminController;

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
$app->router->get('/stores', [SiteController::class, 'stores']);
$app->router->get('/menu', [MenuController::class, 'menu']);
$app->router->get('/collection', [SiteController::class, 'collection']);
$app->router->get('/profile', [ProfileController::class, 'profile']);
$app->router->post('/profile', [ProfileController::class, 'profile']);
$app->router->get('/product', [ProductController::class, 'product']);
$app->router->get('/cart', [SiteController::class, 'cart']);


// Admin nè Long, bắt trước rồi làm theo, mà nhớ xem kỹ giùm anh nha em
$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);

$app->run();