<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class RegisterController extends Controller
{   
    // Метод отображения формы регистрации
    public function index()
    {   
        return $this->render('register');
    }

    // Метод создания нового юзера в бд
    public function store(Request $request)
    {
        // Создаем модель регистрации
        $registerModel = new RegisterModel();
        // Подгружает данные из формы в модель
        $registerModel->loadData($request->getBody());
        
        // Валидируем данные с формы и вызываем метод регистрации
        if ($registerModel->validate() && $registerModel->register()) {
            // Если успешно - выводим страницу Success
            return $this->render('helpers/success', ['text' => 'Your account has been created!']);
        } 
        
        // При ошибки валидации или регистрации выводим страницу с ошибкой регистрации
        return $this->render('helpers/reject', ['text' => "Registration failed!"]);
    }
}