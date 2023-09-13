<?php

namespace app\core;

// Main class
class Application
{
	public static string $ROOT_DIR;
	public static Application $app;
	public static DB $db;
	public Router $router;
	public Request $request;
	public Response $response;

	public function __construct($rootPath)
	{
		self::$ROOT_DIR = $rootPath;
		self::$app = $this;
		self::$db = new DB();
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request, $this->response);
	}

	// Enter point
	public function run(): void
	{
		echo $this->router->resolve();
	}
}
