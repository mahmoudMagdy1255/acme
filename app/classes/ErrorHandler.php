<?php

namespace App\Classes;

class ErrorHandler {

	public function handleErrors($err_number, $err_file, $err_line) {

		$error = "[ {$err_number} ] An Error Occured In File {$err_file} On Line $err_line ";

		$environment = getenv('APP_ENV');

		if ($environment == 'local') {

			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();

		} else {

			$data = [

				'to' => getenv('ADMIN_EMAIL'),
				'subject' => 'System Error',
				'view' => 'errors',
				'name' => 'Admin',
				'body' => $error,

			];

			$this->emailAdmin($data)->outputFriendlyEditor();
		}

	}

	public function outputFriendlyEditor() {
		ob_end_clean();

		view('errors/generic');

		exit;
	}

	public function emailAdmin($data) {

		$mail = new Mail;
		$mail->send($data);

		return $this;

	}

}