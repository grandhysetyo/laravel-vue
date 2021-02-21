import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
// const NotFound = require('./pages/NotFound.vue').default  // cara import cara kedua
import NotFound from '../pages/NotFound.vue'
const routes = [
    {
        path: '/home',
        component: Home
    },
    {
        path: '/about',
        component: About
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