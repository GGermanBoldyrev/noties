<?php

namespace app\controllers;

use app\core\Application;

class RegisterController
{
    public function index()
    {
        return Application::$app->router->renderView('register');    
    }

    public function store()
    {
        return "Registered";
    }
}