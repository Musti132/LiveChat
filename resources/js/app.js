require('./bootstrap');
import App from "./Layout/App.vue";
import Vue from 'vue';
import 'es6-promise/auto'
import axios from 'axios'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Vuex from 'vuex';
import auth from './auth'
import router from './routes'

window.transition = require('../../resources/js/transition.js');
window.toast = require('../../resources/js/toast.js');
window.Vue = Vue;
//window.Vue = Vue
Vue.router = router;
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueAxios, axios);
Vue.use(VueAuth, auth);


Vue.prototype.$apiPath = "api/web/";
Vue.component('App', App);

//axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/web/`

axios.defaults.baseURL = `${process.env.MIX_APP_URL}:8000/api/web/`
const app = new Vue({
    el: '#app',
    router
});