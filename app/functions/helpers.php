<?php

use Philo\Blade\Blade;

if (!function_exists('view')) {
	function view($path, array $data = []) {

		$view = __DIR__ . '/../../resources/view';

		$cache = __DIR__ . '/../../bootstrap/cache';

		$blade = new Blade($view, $cache);

		echo $blade->view()->make($path, $data)->render();

	}
}

if (!function_exists('make')) {
	function make($filename, array $data = []) {

		extract($data);

		ob_start();

		include __DIR__ . '/../../resources/view/emails/' . $filename . '.php';

		$content = ob_get_contents();

		ob_end_clean();

		return $content;
	}
}

if (!function_exists('aurl')) {
	function aurl($url) {

		return getenv('URL') . $url;

	}
}

if (!function_exists('csrf_token')) {
	function csrf_token() {

		return App\Classes\CSRFToken::_token();

	}
}
