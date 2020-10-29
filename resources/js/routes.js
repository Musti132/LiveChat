import VueRouter from 'vue-router'

import Home from './Pages/Dashboard.vue'
import ChatHome from './Pages/Chat/Chat.vue'
import Friends from './Pages/Friends/Friends.vue'
import FriendRequests from './Pages/Friends/FriendsRequest.vue'
import Profile from './Pages/Profile/Profile.vue'
import ProfileShow from './Pages/Profile/ProfileShow.vue'
import Login from './Pages/Auth/Login.vue'
import Register from './Pages/Auth/Register.vue'
import topbar from 'topbar'

const routes = [
    { path: '/', name: 'Home', component: Home, meta: { auth: true } },
    { path: '/chat', name: 'ChatHome', component: ChatHome, meta: { auth: true } },
    { path: '/login', name: 'Login', component: Login, meta: { auth: false } },
    { path: '/register', name: 'Register', component: Register, meta: { auth: false } },
    { path: '/friends', name: 'Friends', component: Friends, meta: { auth: true } },
    { path: '/friends/request', name: 'FriendRequests', component: FriendRequests, meta: { auth: true } },
    { path: '/profile', name: 'Profile', component: Profile, meta: { auth: true } },
    { path: '/profile/:id', name: 'ProfileShow', component: ProfileShow, meta: { auth: true } },
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