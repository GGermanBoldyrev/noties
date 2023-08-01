<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    // Принимаем обьект Request и записываем в свойство
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // Записываем get маршруты в массив
    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    // Записываем post маршруты в массив
    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    // Вызывается через app->run()
    public function resolve()
    {
        // Получаем метод, и пусть с которого отправили запрос
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        // Получаем обьект Clousure
        $callback = $this->routes[$method][$path] ?? false;

        // Fallback, если такой url не найден
        if (!$callback) {
            return "Page not found";
        }

        // Если в роутере второй параметр строка, а не функция, то рендерим view
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // Вызываем функцию Clousure
        return call_user_func($callback);
    }

    // Функция для отображения view
    public function renderView($view)
    {
        include_once "../views/$view.php";
    }
}