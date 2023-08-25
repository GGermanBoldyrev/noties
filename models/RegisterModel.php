<?php

namespace app\models;

use app\core\Model;
use app\Enums\Rule;
use app\core\DBConnection;

class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;

    // TODO: Метод регистрации
    public function register()
    {
        $pdo = new DBConnection();
        $pdo->getAll('users');
    }

    // Validate data, we return the result as bool
    public function validate(): bool
    {
        $this->validateEmail($this->email);
        $this->validatePassword($this->password);
        $this->validateConfirmPassword($this->confirmPassword);
        // Return false if there are errors
        return empty($this->errors);
    }

    // Validate email (required, valid)
    private function validateEmail(string $email): void
    {
        // Check if email field in form is empty
        if (empty($email)) {
            $this->addError(Rule::required, 'email');
        }
        // If email is not empty, we validate it with the following rules
        if ($email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError(Rule::email, 'email');
        }
    }

    // Validate password (required, min - 8, max - 32)
    private function validatePassword(string $password): void
    {
        // Check if password field in form is empty
        if (empty($password)) {
            $this->addError(Rule::required, 'password');
        }
        // If password is less than 8
        if (0 < strlen($password) && strlen($password) <= 7) {
            $this->addError(Rule::min, 'password', ['min' => 8]);
        }
        // If password is greater than 32
        if (strlen($password) > 32) {
            $this->addError(Rule::max, 'password', ['max' => 32]);
        }
    }

    // Validate confirm password (required, matches password)
    private function validateConfirmPassword(string $confirmPassword): void
    {
        // Check if password confirm field in form is empty
        if (empty($confirmPassword)) {
            $this->addError(Rule::required, 'confirmPassword');
        }
        // If the field is not empty and field matches password field above
        if ($confirmPassword && $confirmPassword !== $this->password) {
            $this->addError(Rule::match, 'confirmPassword', ['match' => 'password']);
        }
    }
}
