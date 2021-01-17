
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

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/dashboard',
            name: 'read',
            component: Read,
            props: true
        },
        {
            path: '/admin/create',
            name: 'create',
            component: Create,
            props: true
        },
        {
            path: '/admin/update',
            name: 'update',
            component: Update,
            props: true
        },
        {
            path: '/admin/create/role',
            name: 'createRole',
            component: CreateRole,
            props: true
        },
        {
            path: '/admin/users/',
            name: 'userControl',
            component: UserControl,
            props: true
        },
        {
            path: '/admin/posts/',
            name: 'postsList',
            component: PostsList,
            props: true
        },
        {
            path: '/admin/posts/edit/:postId',
            name: 'editPost',
            component: EditPost,
            props: true
        },
        {
            path: '/admin/configuration/',
            redirect: '/admin/configuration/general',
        },
        {
            path: '/admin/configuration/general',
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
