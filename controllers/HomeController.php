<?php

namespace app\controllers;

use app\core\Application;

class HomeController
{
    public function index() 
    {
        return Application::$app->router->renderView('home');
    }
}