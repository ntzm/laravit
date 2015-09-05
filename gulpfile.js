var elixir = require('laravel-elixir');

var assetsDir = './resources/assets/';

elixir(function(mix) {
    mix
        .styles(
            [
                'bower/bootstrap/dist/css/bootstrap.css',
                'css/main.css'
            ],
            'public/css/style.css',
            assetsDir
        )
        .scripts(
            [
                'bower/jquery/dist/jquery.js',
                'bower/bootstrap/dist/js/bootstrap.js',
                'bower/commonmark/dist/commonmark.js',
                'js/main.js'
            ],
            'public/js/app.js',
            assetsDir
        )
        .copy(
            assetsDir + 'bower/bootstrap/fonts',
            'public/fonts'
        );
});
