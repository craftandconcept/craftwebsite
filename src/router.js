import Vue from 'vue'
import Router from 'vue-router'
import Home from './pages/Home.vue'
import Root from './pages/Root.vue'
import Category from './pages/Category.vue'
import Project from './pages/ProjectPage.vue'
import Team from './pages/Team.vue'
import Creators from './pages/Creators.vue'
import Collaborators from './pages/Collaborators.vue'

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
          path: 'category/:id',
          name: 'Category',
          component: Category
        },
        {
          path: 'project/:id',
          name: 'Project',
          component: Project
        },
        {
          path: 'teams',
          component: Team,
          name: 'team'
        },
        {
          path: 'creators',
          component: Creators,
          name: 'Creators'
        },
        {
          path: 'collaborators',
          component: Collaborators,
          name: 'Collaborators'
        }
      ]
    }
  ]
})
