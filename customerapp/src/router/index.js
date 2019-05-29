import Vue from 'vue'
import Router from 'vue-router'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(Router)

export default new Router({
  routes: [{
    path: '/',
    template: '<App/>',
    component: {
      App
    }
  }]
})
