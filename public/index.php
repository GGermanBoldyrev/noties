<?php

// FIXME: Временный вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../vendor/autoload.php";

use app\core\Application;
use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\controllers\ProfileController;
use Dotenv\Dotenv;

// Load env configuration to work with database
$dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
// Try to load env config file
try {
    $dotenv->load();
} catch (Exception $ex) {
    die($ex->getMessage() . ". You have to add .env file to you root folder.");
}

// Create an instance of App
$app = new Application(dirname(__DIR__));

// Write routes to an array
// Main page
$app->router->get('/', 'home');
// Auth
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'store']);
// Register
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);
// Profile
$app->router->get('/profile', [ProfileController::class, 'index']);

// App start
$app->run();
