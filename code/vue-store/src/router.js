import Vue from 'vue'
import Router from 'vue-router'

import Home from './views/Home.vue'
import About from './views/About.vue'
import Shop from './views/Shop.vue'
import Product from './views/Product'
import Cart from './views/Cart'
import Checkout from './views/Checkout'
import Summary from './views/Summary'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
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
            path: '/shop/:slug',
            name: 'shop',
            component: Shop
        },
        {
            path: '/product/:id',
            name: 'product',
            component: Product
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout
        },
        {
            path: '/summary',
            name: 'summary',
            component: Summary
        }
    ]
})
