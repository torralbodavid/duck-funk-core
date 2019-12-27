const mix = require('laravel-mix');
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
        'src/resources/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        'src/resources/assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
        'src/resources/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'src/resources/assets/js/plugins/apexcharts/apexcharts.min.js',
        'src/resources/assets/js/plugins/peity-chart/jquery.peity.min.js',
        'src/resources/assets/housekeeping-js/pages/dashboard.js',
    ], 'public/js/labs/dependencies/dashboard.min.js')
    //news dependencies
    .combine([
        'src/resources/assets/js/plugins/tinymce-dark/jquery.tinymce.min.js',
        'src/resources/assets/js/plugins/tinymce-dark/tinymce.min.js',
        'src/resources/assets/housekeeping-js/pages/form-editors.int.js',
    ], 'public/js/labs/dependencies/news.min.js')
    .copy('src/resources/assets/js/plugins/tinymce-dark/plugins', 'public/js/labs/dependencies/plugins')
    .copy('src/resources/assets/js/plugins/tinymce-dark/themes', 'public/js/labs/dependencies/themes')
    .copy('src/resources/assets/js/plugins/tinymce-dark/skins', 'public/js/labs/dependencies/skins')
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
    .copy('src/resources/assets/js/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css', 'public/css')
    .copy('src/resources/assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.css', 'public/css')
    .sass('src/resources/assets/scss/style.scss', 'public/css')
    .sass('src/resources/assets/housekeeping-scss/style.scss', 'public/css/housekeeping')
    .js('src/resources/assets/js/duck_funk/labs/dashboard.js', 'public/js/housekeeping/legacy')
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
