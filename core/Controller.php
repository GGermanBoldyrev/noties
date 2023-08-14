<?php

namespace app\core;

abstract class Controller
{
    // Отображает страницу (используя параметры)
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    // Получаем body
    public function getBody()
    {
        return Application::$app->request->getBody();
    }
}