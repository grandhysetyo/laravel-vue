import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
// const NotFound = require('./pages/NotFound.vue').default  // cara import cara kedua
import NotFound from '../pages/NotFound.vue'
import User from '../pages/User.vue'
const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/user/:name?', //tanda ? digunakan untuk parameter opsional jika pengguna melakukan uri /user saja
        component: User
    },
    {
        path:'*',
        component: NotFound
    }
    
]
const router = new VueRouter({
    mode: 'history',
    routes : routes
})

export default router