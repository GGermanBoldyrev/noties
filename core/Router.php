<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    // Write all 'get' routes to an array
    public function get(string $path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    // Write all 'post' routes to an array
    public function post(string $path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    // Calls from app->run()
    public function resolve()
    {
        // Get request method and path
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        // We get Closure object
        $callback = $this->routes[$method][$path] ?? false;

        // Fallback page if url not found, (page not found)
        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView('404');
        }

        // If the second parameter is a string (not a function) we just render view
        if (is_string($callback)) {
            return $this->renderView($callback);
        }   

        // If the second parameter is an array, we create a controller instance,
        // We can't call non-static methods without class instance
        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        // We call Closure function, we pass Request and Response to params (use them in controller methods)
        return call_user_func($callback, $this->request, $this->response);
    }

    // Method to render full view with a template
    public function renderView(string $view, array $params = [])
    {
        $template = $this->renderTemplate();
        $view = $this->renderOnlyView($view, $params);
        // Pass page content to a template and render it
        return str_replace('{{content}}', $view, $template);
    }

    // Cache template
    private function renderTemplate()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/templates/main-template.php";
        return ob_get_clean();
    }

    // We cache page content
    private function renderOnlyView(string $view, array $params)
    {
        // We set names to a variables in view using $params[] array
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/pages/$view.php";
        return ob_get_clean();
    }
}