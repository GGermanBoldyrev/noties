<?php

namespace app\core;

use app\Enums\Rule;

abstract class Model
{
    // Массив ошибок
    public array $errors = [];

    // Заполняем свойства обьекта данными из Request
    public function loadData(array $data): void
    {
        foreach($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // Метод добаления ошибок в массив
    public function addError(Rule $rule, string $property, array $params = []): void
    {
        // Формируем сообщение об ошибке
        $message = $rule->value ?? '';
        // Передаем параметры для min/max
        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                // Формируем новое сообщение об ошибке исходя из min/max length
                $message = str_replace("{{$key}}", $value, $message);
            }
        }
        // Записываем сообщения об ошибках в массив
        $this->errors[$property] = $message;
    }
}