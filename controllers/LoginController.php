<?php

namespace app\controllers;

use app\core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return $this->render('login');
    }

    public function store()
    {
        return "Authed";    
    }
}