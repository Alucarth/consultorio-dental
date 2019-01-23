
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    // require('bootstrap-sass');
} catch (e) {}

// require('admin-lte/bower_components/jquery-ui/jquery-ui.min.js');
// require('~/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js');
// require('admin-lte/bower_components/raphael/raphael.min.js');
// require('admin-lte/bower_components/morris.js/morris.min.js');
// require('admin-lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');
// require('admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
// require('admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
// require('admin-lte/bower_components/jquery-knob/dist/jquery.knob.min.js');
// require('admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.js');
// require('admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');
// require('admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');
// require('admin-lte/bower_components/fastclick/lib/fastclick.js');
// require('~/admin-lte/dist/js/adminlte.min.js');
// require('admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');//revisar XD

// require('admin-lte/bower_components/moment/min/moment.min.js');// add moment js via yarn

// require('bootstrap-sass');

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
