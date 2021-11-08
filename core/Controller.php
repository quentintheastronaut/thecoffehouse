<?php

namespace app\core;

use app\core\Application;
use app\middlewares\BaseMiddleware;
use app\core\Session;

class Controller
{
    public string $layout = 'main';
    public $view;
    
    public function __construct()
    {
        $this->view = new View;
		Session::remove('Success');
		Session::remove('Error');
		Session::remove('Errors');
		Session::remove('OldInput');
    }

    public function jsonResponse($response){
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		http_response_code(200);
		echo json_encode($response);
		exit;
	}

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}