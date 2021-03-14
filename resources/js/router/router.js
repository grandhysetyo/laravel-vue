import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
// const NotFound = require('./pages/NotFound.vue').default  // cara import cara kedua
import NotFound from '../pages/NotFound.vue'
import User from '../pages/User.vue'
import Register from '../pages/Register.vue'
import Profile from '../pages/Profile.vue'
import EditUser from '../pages/EditUser.vue'
const routes = [
    {
        path: '/',
        component: Home
    },
    {
        name: 'Home',
        path: '/home',
        component: Home
    },
    {
        path: '/about',
        component: About
    },
    {
        name: 'User',
        path: '/user', 
        component: User,
    },
    {
        name: 'Register',
        path: '/user/create', 
        component: Register,
    },
    {
        name: 'Profile',
        path: '/user/:id', 
        component: Profile,
        props: true
    },
    {
        name: 'Edit',
        path: '/user/:id/edit', 
        component: EditUser,
        props: true
    },
    {
        path:'*',
        component: NotFound
    }
    
]
const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes : routes
})

export default router