<?php

namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;

class RegisterController extends Controller
{
    public function index()
    {
        return $this->render('register');
    }

    public function store()
    {
        $registerModel = new RegisterModel();
        return "Registered";
    }
}