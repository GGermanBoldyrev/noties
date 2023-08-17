<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;

    // Метод регистрации
    public function register()
    {
        return true;
    }

    // Правила для полей регистрации
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 255]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}