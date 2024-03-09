import { createWebHistory, createRouter } from "vue-router";
import Login from '../views/Login.vue';
import Cars from '../views/Cars.vue';
import Register from '../views/Register.vue';

const routes = [
    {
        path:'/login',
        name:'login',
        component: Login
    },
    {
        path:'/cars',
        name:'cars',
        component: Cars
    },
    {
        path:'/register',
        name:'register',
        component: Register
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;