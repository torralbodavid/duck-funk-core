const mix = require('laravel-mix');
const webpack = require('webpack');

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

mix.options({
    uglify: {
        uglifyOptions: {
            compress: {
                drop_console: true,
            },
        },
    },
})
    .setPublicPath('public')
    .copy('src/resources/assets/js/jquery.min.js', 'public/js')
    .copy('src/resources/assets/js/bootstrap.bundle.min.js', 'public/js')
    .copy('src/resources/assets/js/jquery.slimscroll.js', 'public/js')
    .copy('src/resources/assets/js/waves.min.js', 'public/js')
    .copy('src/resources/assets/js/app.js', 'public/js')
    .copy('src/resources/assets/css/bootstrap.min.css', 'public/css')
    .copy('src/resources/assets/fonts', 'public/fonts')
    .copy('src/resources/assets/icons', 'public/icons')
    .copy('src/resources/assets/css/icons.css', 'public/css')
    .copy('src/resources/assets/css/icons.css.map', 'public/css')
    .sass('src/resources/assets/scss/style.scss', 'public/css')
    .version()
    .copy('public', '../duck-funk/public/vendor/duck-funk-core')
    .webpackConfig({
        resolve: {
            symlinks: false,
            alias: {
                '@': path.resolve(__dirname, 'src/resources/assets/js/'),
            },
        },
        plugins: [new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)],
    });
