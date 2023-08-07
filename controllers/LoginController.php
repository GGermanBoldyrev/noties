<?php

namespace app\controllers;

use app\core\Application;

class LoginController
{
    public function index()
    {
        return Application::$app->router->renderView('login');    
    }

    public function store()
    {
        return "Authed";    
    }
}