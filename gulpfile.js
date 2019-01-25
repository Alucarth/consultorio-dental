const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.styles([
        "bootstrap/dist/css/bootstrap.css",
        // "datatables.net-bs/css/dataTables.bootstrap.css",
        "admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css",
        "admin-lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
        "admin-lte/dist/css/AdminLTE.min.css",
        "admin-lte/dist/css/skins/_all-skins.min.css",
        "admin-lte/bower_components/bootstrap-timepicker/css/timepicker.less",
        // "admin-lte/bower_components/morris.js/morris.css",
        // "admin-lte/bower_components/jvectormap/jquery-jvectormap.css",
        // "admin-lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
        // "admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.css",
        "admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
        "fullcalendar/dist/fullcalendar.css", //ojo no usar el mimificado  en .mim.css tiene conflictos y no aparecen los botones
        ],"public/css/app.css","node_modules")
       .webpack('app.js');
});
