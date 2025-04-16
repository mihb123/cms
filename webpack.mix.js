const mix = require('laravel-mix');

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

mix.scripts([
    'public/admin/theme_metronic/plugins/global/plugins.bundle.js',
    'public/admin/theme_metronic/js/scripts.bundle.js',
    'public/admin/theme_metronic/plugins/custom/jquery-ui/jquery-ui.bundle.js',
    'public/admin/theme_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js',
    'public/admin/theme_metronic/plugins/custom/datatables/datatables.bundle.js',
    'public/admin/theme_metronic/js/pages/crud/datatables/data-sources/javascript.js',
    'public/admin/theme_metronic/js/pages/crud/forms/widgets/select2.js',
    'public/admin/theme_metronic/plugins/custom/jstree/jstree.bundle.js',
    'public/admin/plugins/sweetalert/sweetalert.min.js',
    'public/admin/js/app.min.js',
    'public/admin/theme_metronic/plugins/custom/flot/flot.bundle.js',
    'public/admin/js/base64.js'
], 'public/assets/js/all.js')
    .minify('public/assets/js/all.js');

mix.styles([
    'public/admin/theme_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css',
    'public/admin/theme_metronic/plugins/custom/datatables/datatables.bundle.css',
    'public/admin/theme_metronic/plugins/custom/jstree/jstree.bundle.css',
    'public/admin/theme_metronic/plugins/global/plugins.bundle.css',
    'public/admin/theme_metronic/css/style.bundle.css',
    'public/admin/plugins/sweetalert/sweetalert.css',
], 'public/assets/css/all.css')
    .minify('public/assets/css/all.css');
