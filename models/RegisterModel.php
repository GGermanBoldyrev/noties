<?php

namespace app\models;

use app\core\Model;
use app\Enums\Rule;

class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;
    
    // Метод регистрации
    public function register()
    {
        return false;
    }

    // Валидируем данные
    public function validate(): bool
    {
        // Email
        $this->validateEmail($this->email);
        // Password
        $this->validatePassword($this->password);
        // Confirm password
        $this->validateConfirmPassword($this->confirmPassword);

        // Возвращает bool в зависимости от массива errors[]
        return empty($this->errors);
    }

    // Валидируем email (required, valid)
    private function validateEmail(string $email): void
    {
        // Проверяем пустой он или нет
        if (empty($email)) {
            $this->addError(Rule::required, 'email');
        }
        // Если email существует, то соответствует ли правилам
        if ($email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError(Rule::email, 'email');
        }
    }

    // Валидируем пароль (required, min - 8, max - 32)
    private function validatePassword(string $password): void
    {
        // Если пароль пустой
        if (empty($password)) {
            $this->addError(Rule::required, 'password');
        }
        // Если пароль меньше 8 символов
        if (0 < strlen($password) && strlen($password) <= 7) {
            $this->addError(Rule::min, 'password', ['min' => 8]);
        }
        // Если пароль больше 32 символов
        if (strlen($password) > 32) {
            $this->addError(Rule::max, 'password', ['max' => 32]);
        }
    }

    // Валидируем подтверждение пароля (required, matches password)
    private function validateConfirmPassword(string $confirmPassword): void
    {
        // Если поле подтверждения пароля пустое
        if (empty($confirmPassword)) {
            $this->addError(Rule::required, 'confirmPassword');
        }
        // Если поле не пустое и поле не совпадает с паролем
        if ($confirmPassword && $confirmPassword !== $this->password) {
            $this->addError(Rule::match, 'confirmPassword', ['match' => 'password']);
        }
    }
}