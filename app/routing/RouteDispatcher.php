<?php

namespace App;

use AltoRouter;

class RouteDispatcher {
	protected $match;
	protected $controller;
	protected $method;

	function __construct(AltoRouter $router) {
		$this->match = $router->match();

		if ($this->match) {
			list($controller, $method) = explode('@', $this->match['target']);

			$this->controller = $controller;
			$this->method = $method;

			if (is_callable([new $this->controller, $this->method])) {

				call_user_func_array([new $this->controller, $this->method], [$this->match['params']]);

			} else {
				echo "this method {$this->method} is not definde in {$this->controller}";
			}

		} else {
			header($_SERVER['SERVER_PROTOCOL'] . '404 not found');

			view('errors/404');
		}

	}
}