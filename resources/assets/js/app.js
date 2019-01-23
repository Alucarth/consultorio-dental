
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    // require('datatables.net-dt');
    require('bootstrap');
    window.dt = require( 'datatables.net' )();
    // require('admin-lte/bower_components/jquery-ui/jquery-ui.min.js');
    // $.widget.bridge('uibutton', $.ui.button);
} catch (e) {}
    require('admin-lte');
    require('admin-lte/plugins/input-mask/jquery.inputmask.js');
    require('admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js');
    require('admin-lte/plugins/input-mask/jquery.inputmask.extensions.js');
    require('admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
    require('fullcalendar');

    require('admin-lte/plugins/timepicker/bootstrap-timepicker.min.js');
    // require('admin-lte/plugins/datepicker/bootstrap-datepicker.js');
    
    window.jsPDF = require('jspdf');
    window.Chart = require('chart.js');
    window.moment = require('moment');



// console.log('iniciando la hueva hdp');
// if (typeof jQuery === "undefined") {
//     console.log('se mano');
//     throw new Error("AdminLTE requires jQuery");
//   }
// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: 'body'
// });
