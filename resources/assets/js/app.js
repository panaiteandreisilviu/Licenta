
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/flash.vue'));
Vue.component('role_permission_toggle', require('./components/role_permission_toggle.vue'));
Vue.component('post_publisher', require('./components/post_publisher.vue'));

window.addEventListener('load', function () {

    const app = new Vue({
        el: '#app'
    });

});


