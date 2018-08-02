let mix = require('laravel-mix');

mix.js('resources/assets/js/application.js', 'public/js')
    .js('resources/assets/js/user.js', 'public/js')
    .js('resources/assets/js/translation.js', 'public/js')
    .js('resources/assets/js/dictionary.js', 'public/js')
    .sass('resources/assets/sass/application.scss', 'public/css');
