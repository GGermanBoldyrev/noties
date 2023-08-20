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
        // Подгружаем данные из формы в модель
        $registerModel->loadData($request->getBody());

        // Валидируем данные с формы по заданным параметрам в модели
        if (!$registerModel->validate()) {
            // Если на момент валидации данных с формы появились ошибки, то выводим форму регистрации заново, с ошибками
            return $this->render('register', [
                'errors' => $registerModel->errors,
                'email' => $registerModel->email,
                'password' => $registerModel->password,
                'confirmPassword' => $registerModel->confirmPassword
            ]);
        }
        
        // Вызываем метод регистрации
        if (!$registerModel->register()) {
            // При ошибке - выводим страницу с ошибкой регистрации 
            return $this->render('helpers/reject', ['text' => 'Failed to create your account']);
        }

        // Если регистрация прошла успешно - выводим страницу Success
        return $this->render('helpers/success', ['text' => 'Your account has been created!']);
    }
}