<?php

namespace App\Classes;
use Exception;

class Session {

	public static function add($name, $value) {

		if ($name and $value) {

			return $_SESSION[$name] = $value;

		}

		throw new Exception("Name And Value Are Required", 1);

	}

	public static function get($name) {

		return $_SESSION[$name];

	}

	public static function has($name) {

		if ($name) {

			return isset($_SESSION[$name]);

		}

		throw new Exception("Name Is Required", 1);

	}

	public static function remove($name) {

		if ($name and self::has($name)) {

			unset($_SESSION[$name]);

		}

	}

}