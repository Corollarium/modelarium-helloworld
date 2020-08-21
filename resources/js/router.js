import Vue from 'vue'
import VueRouter from 'vue-router'

import Main from './Main'
import postRoutes from './components/Post/routes'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Main
        },
        ...postRoutes
    ],
});

export default router;
