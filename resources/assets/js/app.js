
require('./bootstrap');
import Vue          from 'vue'
import VueRouter    from 'vue-router'
Vue.use(VueRouter)
import Homepage from './components/Homepage'
import Create   from './components/Create'
import Read     from './components/Read'
import Update   from './components/Update'
import Comments from './components/Comments'
import CreateRole from './components/Createrole'
import UserControl from './components/UserControl'
import PostsList from './components/PostsList'
import EditPost from './components/EditPost'
import Configuration from './components/Configuration'
import Dashboard from './components/Dashboard'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            props: true
        },
        {
            path: '/dashboard/emailCampaign',
            name: 'emailCampaign',
            component: Read,
            props: true
        },
        {
            path: '/dashboard/payments',
            name: 'payments',
            component: Read,
            props: true
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
            props: true
        },
        {
            path: '/update',
            name: 'update',
            component: Update,
            props: true
        },
        {
            path: '/create/role',
            name: 'createRole',
            component: CreateRole,
            props: true
        },
        {
            path: '/users/',
            name: 'userControl',
            component: UserControl,
            props: true
        },
        {
            path: '/posts/',
            name: 'postsList',
            component: PostsList,
            props: true
        },
        {
            path: '/posts/edit/:postId',
            name: 'editPost',
            component: EditPost,
            props: true
        },
        {
            path: '/configuration/',
            redirect: '/configuration/general',
        },
        {
            path: '/configuration/general',
            name: 'configuration',
            component: Configuration,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { Homepage, Comments },
    router,
    // delimiters: ['!{', '}!']
});
