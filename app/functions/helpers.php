<?php

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Philo\Blade\Blade;
use voku\helper\Paginator;
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

if (!function_exists('asset')) {
	function asset($url) {

		return getenv('ASSET_URL') . $url;

	}
}

if (!function_exists('csrf_token')) {
	function csrf_token() {

		return App\Classes\CSRFToken::_token();

	}
}

if (!function_exists('slug')) {
	function slug($value) {

		$value = preg_replace('![^' . preg_quote('_') . '\pL\pN\s]+!u', '', mb_strtolower($value));

		$value = preg_replace('![' . preg_quote('-') . '\s]+!u', '-', $value);

		return trim($value, '-');

	}
}

if (!function_exists('dd')) {
	function dd($value) {

		var_dump($value);die();

	}
}

if (!function_exists('paginate')) {
	function paginate($num_of_records, $total_record, $table_name, $object) {

		$array = [];

		$pages = new Paginator($num_of_records, 'p');

		$pages->set_total($total_record);

		$data = Capsule::select("SELECT * FROM $table_name ORDER BY created_at DESC " . $pages->get_limit());

		foreach ($data as $item) {

			array_push($array, [

				'id' => $item->id,
				'name' => $item->name,
				'slug' => $item->slug,
				'added' => (new Carbon($item->created_at))->toFormattedDateString(),

			]);

		}

		return [$array, $pages->page_links()];

	}
}
