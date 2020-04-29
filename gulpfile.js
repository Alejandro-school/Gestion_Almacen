var gulp = require('gulp');
var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
        'prueba.scss',
    ],  'public/css/style.min.css');
});
