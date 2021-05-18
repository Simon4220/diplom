const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/assets/admin/css/adminlte.min.css',
    'resources/assets/admin/css/table.css'
], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js'
], 'public/assets/admin/js/admin.js');

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');

mix.copy('resources/assets/admin/css/adminlte.min.css.map', 'public/assets/admin/css/adminlte.min.css.map');

mix.styles([
    'resources/assets/front/css/style.css',
    'resources/assets/front/css/header.css',
    'resources/assets/front/css/footer.css',
    'resources/assets/front/css/auth.css',
    'resources/assets/front/css/catalog.css',
    'resources/assets/front/css/categories.css',
    'resources/assets/front/css/product.css',
    'resources/assets/front/css/cart.css',
    'resources/assets/front/css/cabinet.css',
    'resources/assets/front/css/slider.css',
    'resources/assets/front/css/bootstrap.css',
    'resources/assets/front/css/map.css',
    'resources/assets/front/css/order.css',
    'resources/assets/front/css/blog.css',
    'resources/assets/front/css/services.css',
    'resources/assets/front/css/secondservices.css',
], 'public/assets/front/css/front.css');


mix.scripts([
    'resources/assets/front/js/product.js',
    'resources/assets/front/js/cabinet.js',
    'resources/assets/front/js/auth.js',
    'resources/assets/front/js/search.js',
], 'public/assets/front/js/front.js');

mix.copyDirectory('resources/assets/front/images', 'public/assets/front/images');