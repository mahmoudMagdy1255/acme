<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Models\Category;

class ProductCategoryController {

	protected $categories;
	protected $links;

	public function __construct() {

		$total_record = Category::all()->count();

		$object = new Category;

		list($this->categories, $this->links) = paginate(2, $total_record, 'categories', $object);

	}

	public function show() {

		return view('admin/products/categories', ['categories' => $this->categories, 'links' => $this->links]);

	}

	public function store() {

		if (Request::has('post')) {

			$request = Request::get('post');

			if (CSRFToken::verifyCSRFToken($request->token)) {

				$rules = [

					'name' => ['required' => true, 'minLength' => 5, 'string' => true, 'unique' => 'categories'],

				];

				$validation = new ValidateRequest;

				$validation->abide($_POST, $rules);

				if ($validation->hasErrors()) {

					$errors = $validation->getErrors();

				}

				Category::create([

					'name' => $request->name,
					'slug' => slug($request->name),

				]);

				return view('admin/products/categories',
					['categories' => $this->categories, 'errors' => $errors, 'success' => 'Created Successfully', 'links' => $this->links]);

			}

			throw new \Exception("Token Mismatch", 1);

		}

		return null;

	}
}