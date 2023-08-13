<?php

namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;

class RegisterController extends Controller
{
    protected array $errors = [];

    public function index()
    {   
        return $this->render('register', ['errors' => $this->errors]);
    }

    public function store()
    {
        // Создаем модель регистрации
        $registerModel = new RegisterModel();

        // 
        if ($registerModel->validate() && $registerModel->register()) {
            return $this->render('success', ['text' => 'Your account has been created!']);
        }

        return 'Registration failed';
    }
}