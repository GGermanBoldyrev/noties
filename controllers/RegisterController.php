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

        // Валидируем данные с формы
        if (!$registerModel->validate()) {
            // Если на момент валидации формы появились ошибки, то выводим форму с ошибками
            return $this->render('register', [
                'errors' => $registerModel->errors,
                'email' => $registerModel->email,
                'password' => $registerModel->password,
                'confirmPassword' => $registerModel->confirmPassword
            ]);
        }
        // Вызываем метод регистрации, при отказе - сообщаем об ошибке
        if (!$registerModel->register()) {
            return $this->render('helpers/reject', ['text' => 'Failed to create your account']);
        }

        // Если успешно - выводим страницу Success
        return $this->render('helpers/success', ['text' => 'Your account has been created!']);
    }
}