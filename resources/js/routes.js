import VueRouter from 'vue-router'

import Home from './Pages/Dashboard.vue'
import ChatHome from './Pages/Chat/Chat.vue'
import Login from './Pages/Auth/Login.vue'

const routes = [
    { path: '/', name: 'Home', component: Home, meta: { auth: undefined } },
    { path: '/chat', name: 'ChatHome', component: ChatHome, meta: { auth: undefined } },
    { path: '/login', name: 'Login', component: Login, meta: { auth: false } },
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router;