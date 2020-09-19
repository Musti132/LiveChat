import VueRouter from 'vue-router'

import Home from './Pages/Dashboard.vue'
import ChatHome from './Pages/Chat/Chat.vue'
import Login from './Pages/Auth/Login.vue'
import Register from './Pages/Auth/Register.vue'

const routes = [
    { path: '/', name: 'Home', component: Home, meta: { auth: true } },
    { path: '/chat', name: 'ChatHome', component: ChatHome, meta: { auth: true } },
    { path: '/login', name: 'Login', component: Login, meta: { auth: false } },
    { path: '/register', name: 'Register', component: Register, meta: { auth: false } },
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
    linkExactActiveClass: "active",
})

export default router;