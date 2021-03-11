/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'vuetify/dist/vuetify.min.css'; // vuetify style css

window.Vue = require('vue').default;

// import Vue from 'vue'
import vuetify from '../plugins/vuetify' // path to vuetify export


import router from './Router/router'
import User from './Helpers/User'
import VueSimplemde from 'vue-simplemde'
import md from 'marked'

Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('VueSimplemde', VueSimplemde)


window.User = User
window.md = md
window.EventBus = new Vue();

const app = new Vue({
    vuetify: vuetify,
    router,
    el: '#app',
});
