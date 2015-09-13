var elixir = require('laravel-elixir');

var assetsDir = './resources/assets/';

elixir(function (mix) {
    mix
        .styles(
        [
            'bower/bootstrap/dist/css/bootstrap.css',
            'bower/font-awesome/css/font-awesome.css',
            'css/main.css'
        ],
        'public/css/style.css',
        assetsDir
    )
        .scripts(
        [
            'bower/jquery/dist/jquery.js',
            'bower/bootstrap/dist/js/bootstrap.js',
            'js/main.js'
        ],
        'public/js/app.js',
        assetsDir
    )
        .copy(
        assetsDir + 'bower/font-awesome/fonts',
        'public/fonts'
    );
});
