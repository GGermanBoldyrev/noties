<?php

require "../vendor/autoload.php";
use app\core\Application;

$app = new Application(dirname(__DIR__));

// Записываем в массив routes
$app->router->get('/', 'home'); 
$app->router->get('/login', 'login');
$app->router->get('/register', 'register');

// Старт приложения
$app->run();