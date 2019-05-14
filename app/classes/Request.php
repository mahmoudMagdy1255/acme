<?php

namespace App\Classes;

class Request {

	public static function all($is_array = false) {

		$result = [];

		if (count($_GET) > 0) {
			$result['get'] = $_GET;
		}

		if (count($_POST) > 0) {
			$result['post'] = $_POST;
		}

		$result['file'] = $_FILES;

		return json_decode(json_encode($result), $is_array);

	}

	public static function get($key) {

		$data = (new Request())->all()->$key;

		return $data;
	}

	public static function has($key) {

		return array_key_exists($key, self::all(true));

	}

	public static function old($key, $value) {

		return isset(Request::all()->$key->$value) ? Request::all()->$key->$value : '';

	}

	public static function refresh() {

		$_GET = [];
		$_POST = [];
		$_FILES = [];

	}

}