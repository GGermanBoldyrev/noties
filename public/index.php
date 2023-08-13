<?php

require "../vendor/autoload.php";

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\RegisterController;

$app = new Application(dirname(__DIR__));

// Записываем в массив routes
// Главная страница
$app->router->get('/', [HomeController::class, 'index']);
// Авторизация
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'store']);
// Регистрация
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);

// Старт приложения
$app->run();