import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'
import Customers from '@/components/Customers'
import CustomerDetails from '@/components/CustomerDetails'
import About from '@/components/About'
import Add from '@/components/Add'
import Edit from '@/components/Edit'

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
  }, {
    path: '/Customer/:id',
    name: 'customerdetails',
    component: CustomerDetails
  }, {
    path: '/Customer/edit/:id',
    name: 'edit',
    component: Edit
  }]
})
