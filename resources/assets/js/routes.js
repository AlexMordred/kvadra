import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        name: 'index',
        component: require('./views/Index.vue'),
    },
    {
        path: '/points/create',
        name: 'points.create',
        component: require('./views/points/Create.vue')
    },
];

const router = new VueRouter({
    routes
});

export default router;