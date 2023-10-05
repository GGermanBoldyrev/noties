<?php

namespace app\core;

abstract class Controller
{
	// Render the page (using passed parameters)
	public function render($view, $params = [])
    {
		return Application::$app->router->renderView($view, $params);
	}
}
