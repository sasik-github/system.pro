process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');

var NODE_DIRECTORY = '../../../node_modules/';

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
        .sass([
            'app.scss',
            'main.scss',
            'footer.scss'
        ])
        .styles([
            '../../../public/css/app.css',
            '../vendor/select2/css/select2.min.css',
            '../vendor/flat-theme/css/font-awesome.min.css',
            '../vendor/flat-theme/css/prettyPhoto.css',
            '../vendor/flat-theme/css/animate.css',
            '../vendor/flat-theme/css/main.css',
            NODE_DIRECTORY + 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'
            // '../../../node_modules/select2-bootstrap-css/select2-bootstrap.min.css'
            // 'vendor/bootstrap-datetimepicker.min.css',
            // 'vendor/dropzone.css'
        ]);

    mix.version(['css/all.css',  'js/all.js']);

    mix.scripts(
        [
            NODE_DIRECTORY + 'jquery/dist/jquery.min.js',
            NODE_DIRECTORY + 'bootstrap-sass/assets/javascripts/bootstrap.min.js',
            NODE_DIRECTORY + 'chart.js/Chart.min.js',
            NODE_DIRECTORY + 'moment/min/moment-with-locales.min.js',
            NODE_DIRECTORY + 'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
            '../vendor/select2/js/select2.min.js',
            '../vendor/flat-theme/js/main.js',
            'app.js',
            'chart.js'
            // '../../../node_modules/moment/min/moment-with-locales.min.js',
            // 'vendor/bootstrap-datetimepicker.min.js',
            // 'vendor/dropzone.js',
            // 'fileuploader.js',
        ]
    );

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/build/fonts/bootstrap/');
    mix.copy('resources/assets/vendor/flat-theme/fonts', 'public/build/fonts/');

});
