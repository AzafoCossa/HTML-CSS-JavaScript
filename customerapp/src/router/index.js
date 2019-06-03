import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'
import Customers from '@/components/Customers'
import About from '@/components/About'
import Add from '@/components/Add'

Vue.use(Router)
Vue.use(Resource)

export default new Router({
  routes: [{
    path: '/',
    name: 'customers',
    component: Customers
  }, {
    path: '/About',
    name: 'about',
    component: About
  }, {
    path: '/Add',
    name: 'add',
    component: Add
  }]
})
