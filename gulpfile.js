process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');
var bootstrapPath = 'node_modules/bootstrap-sass/assets';
var jqueryJsPath = 'node_modules/jquery/dist/jquery.min.js';

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



    mix.sass('app.scss')
        .copy(bootstrapPath + '/fonts', 'public/build/fonts');

    mix.browserify('app.js');

    mix.version(['css/app.css',  'js/app.js']);

});
