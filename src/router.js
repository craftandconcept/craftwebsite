import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home.vue'
import Root from './pages/Root.vue'
import Login from './pages/admin/Login.vue'
import Category from './pages/Category.vue'
import Project from './pages/ProjectPage.vue'
import Teams from './pages/Teams.vue'
import OurStory from './pages/OurStory.vue'
import Admin from './pages/admin/Admin.vue'
import Dashboard from './pages/admin/Dashboard.vue'
import NewProject from './pages/admin/NewProject.vue'

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
          component: Admin,
          children: [
            {
              path: '',
              name: 'Login',
              component: Login
            },
            {
              path: 'dasboard',
              name: 'Dashboard',
              component: Dashboard
            },
            {
              path: 'project/:id',
              name: 'NewProject',
              component: NewProject
            }
          ]
        },
        {
          path: 'category/:name',
          name: 'Category',
          component: Category
        },
        {
          path: 'project/:id',
          name: 'Project',
          component: Project
        },
        {
          path: '/teams',
          name: 'Teams',
          component: Teams,
          beforeEnter: (to, from, next) => {
            setTimeout(() => {
              next()
            }, 400)
          }
        },
        {
          path: '/story',
          name: 'Story',
          component: OurStory
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
