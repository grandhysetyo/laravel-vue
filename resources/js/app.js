require('./bootstrap');
import Vue from 'vue'
import router from './router/router.js'

import VueNoty from 'vuejs-noty'

Vue.use(VueNoty)

Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);


const app = new Vue({
    el: '#app',
    
    data: {
        title: 'Laravel'
    },
    router
});
