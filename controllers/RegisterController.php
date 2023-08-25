<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class RegisterController extends Controller
{
    // Method to show registration form
    public function index()
    {
        return $this->render('register');
    }

    // Method to create a new User
    public function store(Request $request)
    {
        // Create Register model
        $registerModel = new RegisterModel();
        // Load all form data to Register model
        $registerModel->loadData($request->getBody());

        // Validate all form data in Register model "validate" method
        if (!$registerModel->validate()) {
            // If we got some errors after validation, we show register form once again with occurred errors
            return $this->render('register', [
                'errors' => $registerModel->errors,
                'email' => $registerModel->email,
                'password' => $registerModel->password,
                'confirmPassword' => $registerModel->confirmPassword
            ]);
        }
        
        // Call Register model "register" method
        if (!$registerModel->register()) {
            // If the error occurred - we show Registration failed page
            return $this->render('helpers/reject', ['text' => 'Failed to create your account']);
        }

        // If "validate" and "register" methods passed correctly - we show Success page
        return $this->render('helpers/success', ['text' => 'Your account has been created!']);
    }
}