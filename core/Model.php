<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = "required";
    public const RULE_EMAIL = "email";
    public const RULE_MAX = "max";
    public const RULE_MIN = "min";
    public const RULE_MATCH = "match";
    public array $errors = [];

    // Заполняем свойства обьекта данными из Request
    public function loadData(array $data)
    {
        foreach($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // В дочернем классе прописываем правила валидации
    abstract public function rules(): array;

    // Метод для валидации 
    public function validate()
    {
        // Итерируемся по правилам из дочернего класса
        foreach($this->rules() as $attribute => $rules) {
            // В $value записываем свойство класса по названию аттрибута из rules[]
            $value = $this->$attribute;
            // Итерируемся по правилам валидации
            foreach($rules as $rule) {
                // Название правила
                $ruleName = $rule;
                // Если $rule это массив, то в $ruleName перезыписываем название
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                }

                // Добавляем для каждого правила ошибку в случае появления
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $rule['match']) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            }
        }

        return empty($this->errors);
    }

    // Метод добаления ошибок в массив
    public function addError(string $attribute, string $rule, array $params = [])
    {
        // Формируем сообщение об ошибке
        $message = $this->errorMessages()[$rule] ?? '';
        // Передаем параметры для min/max
        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                // Формируем новое сообщение об ошибке исходя из min/max length
                $message = str_replace("{{$key}}", $value, $message);
            }
        }
        // Записываем сообщения об ошибках в массив
        $this->errors[$attribute][] = $message;
    }

    // Хелпер для сообщений об ошибках
    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => "This field is required",
            self::RULE_EMAIL => "This field must be a valid email address",
            self::RULE_MAX => "Max lengh of this field is {max}",
            self::RULE_MIN => "Min length of this field is {min}",
            self::RULE_MATCH => "This field must be the same as {match}"
        ];
    }
}