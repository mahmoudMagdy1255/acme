<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once __DIR__ . '/../app/config/_env.php';

require_once __DIR__ . '/../app/routing/route.php';

set_error_handler([new App\Classes\ErrorHandler, 'handleErrors']);

new App\Classes\Database();

new App\RouteDispatcher($router);