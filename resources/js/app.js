/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


require('../templates/js/main');
require('../templates/vendor/bootstrap/js/bootstrap.bundle');
require('../templates/vendor/jquery.easing/jquery.easing.min.js');
require('../templates/vendor/php-email-form/validate.js');
require('../templates/vendor/waypoints/jquery.waypoints.min.js');
require('../templates/vendor/counterup/counterup.min.js');
require('../templates/vendor/venobox/venobox.min.js');
require('../templates/vendor/owl.carousel/owl.carousel.min.js');
require('../templates/vendor/isotope-layout/isotope.pkgd.min.js');
require('../templates/vendor/aos/aos.js'); 

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
