var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// Commented scripts are necessary, but to improve performance they have been sourced from cdnjs in app.blade.php

elixir(function(mix) {

    mix.sass('app.scss', 'public/css', {outputStyle: 'compressed'});

    mix.scripts(['admin/edit.js'], 'public/js/admin-edit.js');

    // mix.scripts(
    // 	[
    // 	'../../../public/vendor/unite_gallery/js/jquery-11.0.min.js', 
    // 	'../../../public/vendor/bootstrap.min.js', 
    // 	'../../../public/vendor/unite_gallery/js/unitegallery.min.js'
    // 	], 'public/js/vendor.js');

    mix.scripts([
        //'../../../public/vendor/unite_gallery/themes/default/ug-theme-default.js', 
        'yuru/home.js'], 
        'public/js/home.js');
    
    mix.scripts([
        //'../../../public/vendor/unite_gallery/themes/tiles/ug-theme-tiles.js', 
        'yuru/page.js'], 
        'public/js/page.js');
    
    mix.version([
        'public/css/app.css', 
        //'public/js/vendor.js', 
        'public/js/admin-edit.js', 'public/js/home.js', 'public/js/page.js'])
});
