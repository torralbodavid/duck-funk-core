const mix = require("laravel-mix");

require("laravel-mix-tailwind");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.
     setPublicPath('./public/')
    .js("src/resources/assets/js/app.js", "js/app.js")
    .sass("src/resources/assets/sass/app.scss", "css/app.css")
    .tailwind("./tailwind.config.js")
    .sourceMaps()
    .version();

if (mix.inProduction()) {
    mix.version();
}
