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

    mix
        .sass('app.scss')
        .styles([
            '../../../public/css/app.css',
            '../vendor/select2/css/select2.min.css',
            // '../../../node_modules/select2-bootstrap-css/select2-bootstrap.min.css'
            // 'vendor/bootstrap-datetimepicker.min.css',
            // 'vendor/dropzone.css'
        ]);

    mix.scripts(
        [
            '../../../node_modules/jquery/dist/jquery.min.js',
            '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            '../vendor/select2/js/select2.min.js',
            'app.js'
            // '../../../node_modules/moment/min/moment-with-locales.min.js',
            // 'vendor/bootstrap-datetimepicker.min.js',
            // 'vendor/dropzone.js',
            // 'fileuploader.js',
        ]
    );

    mix.version(['css/all.css',  'js/all.js']);

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/build/fonts/bootstrap/');

});
