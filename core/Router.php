<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    // Принимаем обьект Request и записываем в свойство
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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

        // Fallback, если такой url не найден, (страница не найдена)
        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView('404');
        }

        // Если в роутере второй параметр строка, а не функция, то рендерим view
        if (is_string($callback)) {
            return $this->renderView($callback);
        }   

        // Если в роутере второй параметр массив, создаем экземпляр контроллера,
        // Так как нельзя вызывать не статические методы не у экземпляра класса
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        // Вызываем функцию Clousure
        return call_user_func($callback);
    }

    // Функция для отображения view
    public function renderView($view)
    {
        $template = $this->renderTemplate();
        $view = $this->renderOnlyView($view);
        // Вставляем контент страницы в шаблон и рендерим его
        return str_replace('{{content}}', $view, $template);
    }

    // Кэшируем шаблон
    private function renderTemplate()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/templates/main.php";
        return ob_get_clean();
    }

    // Кэшируем контент страницы
    private function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}