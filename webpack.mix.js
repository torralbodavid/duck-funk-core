const mix = require('laravel-mix');
require('laravel-mix-purgecss');
const webpack = require('webpack');

/*
Labs initialize
 */
mix
    .combine([
        'src/resources/assets/js/jquery.min.js',
        'src/resources/assets/js/bootstrap.bundle.min.js',
        'src/resources/assets/js/metismenu.min.js',
        'src/resources/assets/js/jquery.slimscroll.js',
        'src/resources/assets/js/waves.min.js'
    ], 'public/js/labs/dependencies/initial.min.js')
    //dashboard dependencies
    .combine([
        'src/resources/assets/housekeeping-js/pages/dashboard.js',
    ], 'public/js/labs/dependencies/dashboard.min.js')
    //news dependencies
    .combine([
        'src/resources/assets/housekeeping-js/pages/form-editors.int.js',
    ], 'public/js/labs/dependencies/news.min.js')
    .version();


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
    .copy('src/resources/assets/js/metismenu.min.js', 'public/js')
    .copy('src/resources/assets/js/waves.min.js', 'public/js')
    .copy('src/resources/assets/js/app.js', 'public/js')
    .copy('src/resources/assets/housekeeping-js/app.js', 'public/js/housekeeping')
    .copy('src/resources/assets/css/bootstrap.min.css', 'public/css')
    .copy('src/resources/assets/fonts', 'public/fonts')
    .copy('src/resources/assets/icons', 'public/icons')
    .copy('src/resources/assets/css/icons.css', 'public/css')
    .copy('src/resources/assets/css/icons.css.map', 'public/css')
    .copy('src/resources/assets/css/metismenu.min.css', 'public/css')
    .sass('src/resources/assets/scss/style.scss', 'public/css')
    .sass('src/resources/assets/housekeeping-scss/style.scss', 'public/css/housekeeping')
    .js('src/resources/assets/js/duck_funk/labs/*', 'public/js/housekeeping/legacy/labs.js')
    .purgeCss()
    .version()
    .webpackConfig({
        resolve: {
            symlinks: false,
            alias: {
                '@': path.resolve(__dirname, 'src/resources/assets/js/'),
            },
        },
        plugins: [new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)],
    });
