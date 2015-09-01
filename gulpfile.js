var elixir = require('laravel-elixir');

var assets = './node_modules/';

elixir(function(mix) {
    mix.styles([
        'bootstrap/dist/css/bootstrap.css',
        '../resources/assets/css/main.css'
    ], 'public/css/style.css', assets);
    mix.scripts([
        'jquery/dist/jquery.js',
        'bootstrap/dist/js/bootstrap.js'
    ], 'public/js/app.js', assets);
});
