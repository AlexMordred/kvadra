require('./bootstrap');
import Vuex from 'vuex';
import VueRouter from 'vue-router'
import router from './routes.js';

Vue.use(Vuex);
Vue.use(VueRouter);

// Vuex store
const store = new Vuex.Store({
    state: { categories, points }
});

// Vue components
Vue.component('vue-layout', require('./views/layout/App.vue'));
Vue.component('l-map', require('./components/Map.vue'));
Vue.component('vue-select', require('./components/Select.vue'));
Vue.component('vue-input', require('./components/Input.vue'));

// Vue app
const app = new Vue({
    el: '#app',
    store,
    router
});
