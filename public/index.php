<?php

require "../vendor/autoload.php";

use app\core\Application;
use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\controllers\ProfileController;

$app = new Application(dirname(__DIR__));

// Записываем эндпоинты в массив routes[]
// Главная страница
$app->router->get('/', 'home');
// Авторизация
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'store']);
// Регистрация
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);
// Профиль
$app->router->get('/profile', [ProfileController::class, 'index']);

// Старт приложения
$app->run();