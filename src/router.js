import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home.vue'
import Root from './pages/Root.vue'
import Login from './pages/Login.vue'
import Category from './pages/Category.vue'
<<<<<<< HEAD
import Project from './pages/ProjectPage.vue'
=======
import Teams from './pages/Teams.vue'
>>>>>>> 52b67a6857d97fad4e8f00641c7d7f05156f0be1

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '*',
      redirect: { name: 'Home' }
    },
    {
      path: '/',
      component: Root,
      children: [
        {
          path: '',
          name: 'Home',
          component: Home
        },
        {
          path: '/admin',
          name: 'Login',
          component: Login
        },
        {
          path: 'category/:name',
          name: 'Category',
          component: Category
        },
        {
<<<<<<< HEAD
          path: 'project/:id',
          name: 'Project',
          component: Project
=======
          path: '/teams',
          name: 'Teams',
          component: Teams
>>>>>>> 52b67a6857d97fad4e8f00641c7d7f05156f0be1
        }
      ]
    },
    {
      path: '/fr',
      component: Root,
      children: [
        {
          path: '',
          name: 'Home-fr',
          component: Home
        },
        {
          path: 'category/:name',
          name: 'Category-fr',
          component: Category
        }
      ]
    }
  ]
})
