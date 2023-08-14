<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class RegisterController extends Controller
{
    // Показ формы регистрации, прокидываем массив $errors[]
    public function index()
    {   
        return $this->render('register');
    }

    // Метод создания нового юзера в бд
    public function store(Request $request)
    {
        // Создаем модель регистрации
        $registerModel = new RegisterModel();
        $registerModel->loadData($request->getBody());
        
        // Валидируем данные с формы и вызываем метод регистрации. Если успешно - выводим страницу Success
        if ($registerModel->validate() && $registerModel->register()) {
            return $this->render('success', ['text' => 'Your account has been created!']);
        } 
        // При ошибки валидации или регистрации выводим страницу с ошибкой регистрации
        return $this->render('reject', ['text' => "Registration failed!"]);
    }
}