<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

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