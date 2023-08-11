<?php

namespace app\core;

class Controller
{
    // Отображает страницу (используя параметры)
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}