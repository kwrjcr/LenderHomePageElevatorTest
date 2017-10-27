
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../node_modules/axios');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var floorRequests = [];
var floorRequest;
var userFloor;

Vue.component('buttons-list', {

    template: '<div><div class="userFloor"><userFloor v-for="userFloor in userFloors" :floorNumber="userFloor.floorNumber">{{ userFloor.userFloor }}</userFloor></div><div class="floorRequest"><btn v-for="btn in buttons" :floorNumber="btn.floorNumber">{{ btn.btn }}</btn></div><div class="sendRequest"><button @click="sendRequest()">Send Request</button></div></div>',

    data() {
        return {
            buttons: [
                { btn: "Ground (1st Floor)", floorNumber: '1' },
                { btn: "2nd Floor", floorNumber: '2' },
                { btn: "3rd Floor", floorNumber: '3' },
                { btn: "4th Floor", floorNumber: '4' },
                { btn: "5th Floor", floorNumber: '5' },
                { btn: "6th Floor", floorNumber: '6' },
                { btn: "7th Floor", floorNumber: '7' }
            ],
            userFloors: [
                { userFloor: "Ground (1st Floor)", floorNumber: '1' },
                { userFloor: "2nd Floor", floorNumber: '2' },
                { userFloor: "3rd Floor", floorNumber: '3' },
                { userFloor: "4th Floor", floorNumber: '4' },
                { userFloor: "5th Floor", floorNumber: '5' },
                { userFloor: "6th Floor", floorNumber: '6' },
                { userFloor: "7th Floor", floorNumber: '7' }
            ]
        }
    },

    methods: {
        sendRequest() {

            floorRequests.userFloor = userFloor;
            floorRequests.floorRequest = floorRequest;

            axios
                .post('/update', {
                    userFloor: userFloor,
                    floorRequest: floorRequest
                })
                .then(function (response) {
                    console.log(response['data']);

                    if (response['data']['direction'] == 'empty') {
                        app.elevator = "Floor " + response['data']['destination'] + " is down for maintenance";
                        app.destination = "Please choose a different floor";
                    } else {
                        app.elevator = "Elevator #" + response['data']['id'] + " is now heading to: ";
                        app.destination = "floor " + response['data']['destination'];
                    }
                })
        },
    }
});

Vue.component('btn', {

    props: [ 'floorNumber' ],

    template: '<li><button @click="addFloor()"><slot></slot></button></li>',

    methods: {
        addFloor() {
            floorRequest = this.floorNumber;
        }
    }
});


Vue.component('userFloor', {

    props: [ 'floorNumber' ],

    template: '<li><button @click="addUserFloor()"><slot></slot></button></li>',

    methods: {
        addUserFloor() {
            userFloor = this.floorNumber;
        }
    }

});

app = new Vue({

    el: '#root-element',

    data: {
        destination: '',
        elevator: '',
        floorRequests: [],
        userFloor: 0,
        floorRequest: 0
    },
});

