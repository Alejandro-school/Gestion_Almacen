var gulp = require('gulp');
var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
        'layout.scss',
    ],  'public/css/style.min.css');
});

elixir(function(mix) {
    mix.scripts([
        'general.js',
        'QuaggaScanner.js',
        'quagga.js',
    ],  'public/js/script.min.js');
});
