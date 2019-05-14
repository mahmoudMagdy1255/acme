<?php

namespace App\Classes;

class UploadFile {

	protected $filename;
	protected $max_filesize = 2097152;
	protected $extension;
	protected $path;

	public function getName() {

		return $this->filname;

	}

	protected function setName($file, $name) {

		if (!$name) {

			$name = pathinfo($file, PATHINFO_FILENAME);

		}

		$name = strtolower(str_replace(' ', '', $name));

		$hash = md5(microtime());

		$ext = $this->fileExtension($file);

		$this->filename = "{$name}-{$hash}.{$ext}";

	}

	protected function fileExtension($file) {

		return $this->extension = pathinfo($file, PATHINFO_EXTENSION);

	}

	protected static function fileSize($fileSize) {

		$fileobj = new static;

		return $fileSize > $fileobj->max_filesize;

	}

	public static function isImage($file) {

		$fileobj = new static;

		$ext = $fileobj->fileExtension($file);

		$validEXT = ['png', 'jpg', 'jpeg', 'bmp', 'gif'];

		return in_array(strtolower($ext), $validEXT);

	}

	public function path() {

		return $this->path;

	}

	public static function move($temp_path, $folder, $file, $new_filename) {

		$fileobj = new static;
		$ds = DIRECTORY_SEPARATOR;

		$fileobj->setName($file, $new_filename);

		$file_name = $fileobj->getName();

		if (!is_dir($folder)) {
			mkdir($folder, 0777, true);
		}

		$fileobj->path = "{$folder}{$ds}{$file_name}";

		$absolute_path = BASE_PATH . "{$ds}public{$ds}{$fileobj->path}";

		if (move_uploaded_file($temp_path, $absolute_path)) {
			return $fileobj;
		}

		return false;

	}

}