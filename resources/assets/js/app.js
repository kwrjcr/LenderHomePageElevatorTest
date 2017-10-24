
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


//Vue.component('buttons', require('./components/ButtonComponent.vue'));

Vue.component('buttons-list', {

    template: '<div><but v-for="but in buttons" :floorNumber="but.floorNumber">{{ but.but }}</but></div>',

    data() {
        return {
            buttons: [
                { but: "Ground (1st Floor)", floorNumber: '1' },
                { but: "2nd Floor", floorNumber: '2' },
                { but: "3rd Floor", floorNumber: '3' },
                { but: "4th Floor", floorNumber: '4' },
                { but: "5th Floor", floorNumber: '5' },
                { but: "6th Floor", floorNumber: '6' },
                { but: "7th Floor", floorNumber: '1' }
            ]
        }
    }
});

var floorRequests = [];

Vue.component('but', {

    props: [ 'floorNumber' ],

    template: '<li><button @click="printFloor()"><slot></slot></button></li>',

    methods: {
        printFloor: function () {
            floorRequests.push(this.floorNumber);
            this.message = floorRequests;
        }
    }
});


new Vue({

    el: '#root-element',

    data: {
        message: ''
    }

});












/*Vue.component('elevator-component', require('./components/ElevatorComponent.vue'));
Vue.component('button-component', require('./components/ButtonComponent.vue'));

const appdiv = new Vue({

    el: '#appdiv'

});

/*var floorRequests = [];

const floorButtons = new Vue({

    el: '#root-element',

    data: {
        message: ''
    },

    methods: {
        printFloor: function (floorNumber) {
            floorRequests.push(floorNumber);
            this.message = floorRequests;
        }
    }

});

/*const floorButtons = new Vue({
    el: '.floor-buttons',
    data: {
        message: ''
    },
    methods: {
        printFloor: function (floorNumber) {
            floorRequests.push(floorNumber);
            this.message = floorRequests;
        }
    }
});*/
