import VueRouter from 'vue-router'

import Home from './Pages/Dashboard.vue'
import ChatHome from './Pages/Chat/Chat.vue'
import ChannelCreate from './Pages/Channel/Create.vue'
import ChannelHome from './Pages/Channel/Home.vue'
import Friends from './Pages/Friends/Friends.vue'
import FriendRequests from './Pages/Friends/FriendsRequest.vue'
import Profile from './Pages/Profile/Profile.vue'
import ProfileShow from './Pages/Profile/ProfileShow.vue'
import Login from './Pages/Auth/Login.vue'
import Register from './Pages/Auth/Register.vue'
import topbar from 'topbar'

const routes = [
    { path: '/', name: 'Home', component: Home, meta: { auth: true, keepAlive: false } },
    { path: '/channel/create', name: 'ChannelCreate', component: ChannelCreate, meta: { auth: true, keepAlive: true }},
    { path: '/channel/:chatId', name: 'ChatHome', component: ChatHome, meta: { auth: true, keepAlive: false }, props: { default: true, }, },
    { path: '/channel', name: 'ChannelHome', component: ChannelHome, meta: { auth: true, keepAlive: false }},
    { path: '/login', name: 'Login', component: Login, meta: { auth: false, keepAlive: true } },
    { path: '/register', name: 'Register', component: Register, meta: { auth: false, keepAlive: true } },
    { path: '/friends', name: 'Friends', component: Friends, meta: { auth: true, keepAlive: false } },
    { path: '/friends/request', name: 'FriendRequests', component: FriendRequests, meta: { auth: true, keepAlive: false } },
    { path: '/profile', name: 'Profile', component: Profile, meta: { auth: true, keepAlive: true } },
    {
        path: '/profile/:userId',
        name: 'ProfileShow',
        component: ProfileShow,
        meta: {
            auth: true,
            keepAlive: false
        },
        props: {
            default: true,
        },
    },
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
    linkExactActiveClass: "active",
})

/**
 * Topbar plugin configuration
 */
topbar.config({
    autoRun: true,
    barThickness: 2,
    barColors: {
        '1': '#2ecc71',
    },
    shadowBlur: 10,
    shadowColor: 'rgba(0,   0,   0,   .6)'
})

router.beforeResolve((to, from, next) => {
    if (to.name) {
        topbar.show()
    }
    next()
})

router.afterEach((to, from) => {
    topbar.hide()
})


export default router;