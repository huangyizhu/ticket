import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/Login'
import Home from '@/components/Home'
import List from '@/components/List'
import Add from '@/components/AddVenue'
import detail from '@/components/DetailVenue'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'HelloWorld',
            component: HelloWorld
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/home',
            component: Home,
            children: [
                { path: 'list', component: List, name: 'list', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }},
                { path: 'add', component: Add, name: 'add', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }},
                { path: 'detail', component: detail, name: 'detail', meta: { hideLeft: false, module: 'Administrative', menu: 'menu' }}
            ]
        }
    ]
})
