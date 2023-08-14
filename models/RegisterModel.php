<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 255]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}