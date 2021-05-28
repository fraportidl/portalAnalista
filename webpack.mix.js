let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/bootstrap/css')
    .js('node_modules/jquery/dist/jquery.js', 'public/js')
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/bootstrap/js');




