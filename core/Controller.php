<?php

namespace app\core;

abstract class Controller
{
    // Отображает страницу (используя параметры)
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}