import Vue from 'vue'
import Router from 'vue-router'
import Customers from '@/components/Customers'
import About from '@/components/About'

Vue.use(Router)

export default new Router({
  routes: [{
    path: '/',
    name: 'customers',
    component: Customers
  }, {
    path: '/About',
    name: 'about',
    component: About
  }]
})
