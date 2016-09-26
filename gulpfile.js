var elixir = require('laravel-elixir');

require('laravel-elixir-uncss');

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

elixir(function(mix) {
    mix.scripts(
        [
        '../../../bower_components/jquery/dist/jquery.js',
        '../../../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
        '../../../bower_components/unitegallery/dist/js/unitegallery.js',
        'admin/edit.js',
        'yuru',
        'common.js'
        ],
         'public/js/app.js');

    /* Do not version these files through elixir but use hardcoded versions*/
    mix.scripts(['../../../bower_components/unitegallery/dist/themes/default/ug-theme-default.js'], 
        'public/js/unitegallery/ug-theme-default-1-7-28.js');

    mix.scripts(['../../../bower_components/unitegallery/dist/themes/tiles/ug-theme-tiles.js'], 
        'public/js/unitegallery/ug-theme-tiles-1-7-28.js');

    mix.copy('bower_components/simplemde/dist/simplemde.min.css', 'public/css/simplemde/simplemde-1-11-2.min.css');
    mix.copy('bower_components/simplemde/dist/simplemde.min.js', 'public/js/simplemde/simplemde-1-11-2.min.js');


    /* Compile Stylesheets */
    mix.sass('app.scss', 
        'resources/assets/css/build',
        {
            includePaths: [ "bower_components/bootstrap-sass/assets/stylesheets"]
    });

    mix.copy('bower_components/unitegallery/dist/images', 'public/build/images');
    mix.copy('bower_components/unitegallery/dist/themes/default/images', 'public/build/css/images');
    mix.copy('bower_components/unitegallery/dist/skins/default', 'public/build/skins/default');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/build/fonts/bootstrap');


    mix.uncss('build/app.css', {
        html: ['http://yuru.app', 'http://yuru.app/page/rooms', 'http://yuru.app/contact', 'http://yuru.app/login', 'http://yuru.app/admin/page/test/rooms'],
        media : ['(min-width: 700px) handheld and (orientation: landscape)'],
        ignore: [
         '#added_at_runtime',
         '.created_by_jQuery',
         ".fade",
         ".fade.in",
         ".collapse",
         ".collapse.in",
         ".navbar-collapse.in",
         ".collapsing",
         ".pull-right",
         /\.dropdown-+/,
         /\.open/,
         /(\.)*ripple(-+)?/,
         ".caret",
         ".glyphicon",
         ".glyphicon-remove",
         ".glyphicon-user",
         ".glyphicon-envelope",
         ".glyphicon-refresh",
         ".glyphicon-off",
         /affix/,
         ".table"
       ]
    },  'resources/assets/css/build/trim/');


    mix.styles(
        [
        'build/trim/app.css', 
        // 'build/app.css', 
        '../../../bower_components/unitegallery/dist/css/unite-gallery.css',
        '../../../bower_components/unitegallery/dist/themes/default/ug-theme-default.css'
    ], 'public/css');

    mix.version([
        'public/css/all.css',
        'public/js/app.js'
        ]);
    

    // mix.sass('app.scss')
    //     .styles(
    //     [
    //         '../../../public/css/app.css',
    //         '../../../bower_components/unitegallery/dist/css/unite-gallery.css',
    //         '../../../bower_components/unitegallery/dist/themes/default/ug-theme-default.css'
    //     ] ,'public/css')
    //     .version([
    //         'public/css/all.css',
    //         'public/js/app.js'
    //     ]);
});
