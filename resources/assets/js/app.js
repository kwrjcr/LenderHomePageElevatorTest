
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('elevator-component', require('./components/ElevatorComponent.vue'));

const appdiv = new Vue({
    el: '#appdiv'
});

const floorRequest = new Vue({
    el: '#floor-requests',
    data: {
        message: "This is where the floor requests will be tallied."
    }
});

const printFloor = new Vue({
    el: '.button-floors',
    data: {
        message: "This is where the floor requests will be tallied."
    }
});
