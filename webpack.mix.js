let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js').minify('public/js/app.js').version();
mix.sass('resources/assets/sass/app.scss', 'public/css', {
	outputStyle: 'compressed'
}).version();
mix.sass('resources/assets/sass/wysiwyg.scss', 'public/css', {
	outputStyle: 'compressed'
}).version();
mix.sass('resources/assets/fonts/butler/butler.scss', 'public/fonts', {
	outputStyle: 'compressed'
}).version();
