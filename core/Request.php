<?php

namespace app\core;

class Request
{
    // Функция для получения пути
    public function getPath(): string
    {
        // Получаем путь или "/"
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // Ищем позицию "?"
        $position = strpos($path, '?');

        // Если нет get параметра, возаращаем просто url
        if (!$position) {
            return $path;
        }

        // Если есть get параметр, обрезаем url до "?"
        return substr($path, 0, $position);
    }

    // Получем метод запроса в lowercase
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}