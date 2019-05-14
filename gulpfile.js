/*
var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var gulp = require('gulp');


elixir(function (mix) {
	
	mix.sass("resources/assets/sass/app.scss","resources/assets/css");
	
	var bowerPath = 'bower/vendor';

	mix.styles(
		[
			"css/app.css",
			bowerPath + '/slick-carousel/slick/slick.css'
		],
		"public/css/all.css",
		"resources/assets"
	);


	mix.scripts(
		[
			bowerPath + '/jquery/dist/jquery.min.js',
			bowerPath + '/foundation-sites/dist/js/foundation.min.js',
			bowerPath + '/slick-carousel/slick/slick.min.js',
			"js/*.js"
		],
		"public/js/all.js",
		"resources/assets"
	);

});

*/