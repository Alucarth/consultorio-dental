
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
    require('admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js');
    require('admin-lte/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js');

    require('admin-lte/bower_components/jquery-ui/jquery-ui.min.js');
    require('admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');

    window.jsPDF = require('jspdf');
    window.Chart = require('chart.js');
    window.moment = require('moment');
  
    import "fullcalendar";

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
