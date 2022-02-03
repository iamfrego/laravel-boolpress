// 0 Import Vue Router and use it
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//  1. Define few route pages components to start.
const Home = Vue.component('Home', require('./pages/Home.vue').default);
const About = Vue.component('About', require('./pages/About.vue').default);
const Contacts = Vue.component('Contacts', require('./pages/Contacts.vue').default);
const Posts = Vue.component('Posts', require('./pages/Post.vue').default);

// 2. Define some named routes and use the components defined above
Vue.component('App', require('./App.vue').default);
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: Contacts
    },
    {
        path: '/posts',
        name: 'posts',
        component: Posts
    },

]
// 3 Create e router instance
const router = new VueRouter({
    mode: 'history', // <-- HTML history mode to remove the # from the url
    routes
})

// 4 Inject the router instance
const app = new Vue({
    el: '#app',
    router
});
