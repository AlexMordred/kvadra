require('./bootstrap');
import Vuex from 'vuex';

Vue.use(Vuex);

// Vuex store
const store = new Vuex.Store({
    state: { categories, points }
});

// Vue components
Vue.component('vue-layout', require('./views/layout/App.vue'));

// Vue app
const app = new Vue({
    el: '#app',
    store
});
