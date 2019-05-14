<?php

namespace App\Controllers\Admin;

use App\Classes\Request;
use App\Classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController {

	public function show() {

		Session::add('admin', 'you are admin');
		Session::remove('admin');

		if (Session::has('admin')) {
			$msg = Session::get('admin');
		} else {
			$msg = 'Not defined';
		}

		return view('admin/dashboard', ['admin' => $msg]);

	}

	public function get() {

		var_dump(Request::old('post', 'product'));

		if (Request::has('post')) {

			$request = Request::get('post');

		}

	}
}