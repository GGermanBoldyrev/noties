<?php

require "../vendor/autoload.php";
use app\core\Application;
use app\controllers\SiteController;

$app = new Application(dirname(__DIR__));

// Записываем в массив routes
// Главная страница
$app->router->get('/', 'home');
// Авторизация
$app->router->get('/login', 'login');
$app->router->post('/login', [SiteController::class, 'handleSingin']);
// Регистрация
$app->router->get('/register', 'register');
$app->router->post('/register', [SiteController::class, 'handleRegistration']);

// Старт приложения
$app->run();