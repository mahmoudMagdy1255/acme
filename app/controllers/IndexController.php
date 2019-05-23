<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController {

	public function show() {

		echo "inside home page";

		$mail = new Mail;

		$data = [

			'to' => getenv('ADMIN_EMAIL'),
			'subject' => 'Welcome To Acme Store',
			'view' => 'welcome',
			'name' => 'Megooo',
			'body' => 'Testing Email',

		];

		if ($mail->send($data)) {

			echo "Email Sent Successfully";

		} else {

			echo "Email Sending Failed";
		}

	}

}