let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/style.css',
], 'public/css/style.css').version();

mix.scripts([
    'resources/assets/js/jquery-3.5.1.min.js',
    'resources/assets/js/bootstrap.min.js'
], 'public/js/scripts.js').version();