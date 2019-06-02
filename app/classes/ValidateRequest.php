<?php

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest {

	private static $errors = [];

	private static $error_messages = [

		'string' => 'the :attr filed cannot numbers',
		'required' => 'the :attr filed is required',
		'minLength' => 'the :attr filed must be a minimum of :policy characters',
		'maxLength' => 'the :attr filed must be a maximum of :policy characters',
		'mixed' => 'the :attr filed can containt characters , numbers , sash and only space',
		'number' => 'the :attr filed can containt letters , e.g 20 , 30.0',
		'email' => 'Email Address Is Not Valid',
		'unique' => 'the :attr is already taken , try another one',

	];

	public function abide($data, $policies) {

		foreach ($data as $column => $value) {

			if (in_array($column, array_keys($policies))) {

				self::doValidation([

					'column' => $column,
					'value' => $value,
					'policies' => $policies[$column],

				]);

			}

		}

	}

	public static function doValidation($data) {

		$column = $data['column'];

		foreach ($data['policies'] as $rule => $policy) {

			$valid = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);

			if (!$valid) {

				self::setErrors(

					str_replace([':attr', ':policy', '_'], [$column, $policy, ' '], self::$error_messages[$rule]),

					$column

				);

			}

		}

	}

	public static function unique($column, $value, $policy) {

		if (trim($value)) {

			return !Capsule::table($policy)->where($column, '=', $value)->exists();

		}

		return false;

	}

	public static function required($column, $value, $policy) {

		return !empty(trim($value));

	}

	public static function minLength($column, $value, $policy) {

		if (trim($value)) {

			return strlen($value) >= $policy;
		}

		return false;

	}

	public static function maxLength($column, $value, $policy) {

		if (trim($value)) {

			return strlen($value) <= $policy;
		}

		return false;

	}

	public static function email($column, $value, $policy) {

		if (trim($value)) {

			return filter_var($value, FILTER_VALIDATE_EMAIL);
		}

		return false;

	}

	public static function mixed($column, $value, $policy) {

		if (trim($value)) {

			return preg_match('/^[A-Za-z0-9 .,_~\-!@#$%\^\&\'\*\(/)]+$/', $value);

		}

		return false;

	}

	public static function string($column, $value, $policy) {

		if (trim($value)) {

			return !preg_match('/^[0-9.]+$/', $value);

		}

		return false;

	}

	public static function number($column, $value, $policy) {

		if (trim($value)) {

			return preg_match('/^[0-9.]+$/', $value);

		}

		return false;

	}

	public static function setErrors($error, $key = null) {

		if ($key) {

			self::$errors[$key][] = $error;

		} else {

			self::$errors[] = $error;
		}

	}

	public function hasErrors() {

		return count(self::$errors) > 0;

	}

	public function getErrors() {

		return self::$errors;

	}

}