<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function validate()
    {
        return true;
    }

    public function register()
    {
        return true;
    }
}