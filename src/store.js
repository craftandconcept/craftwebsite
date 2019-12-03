import Vue from 'vue'
import Vuex from 'vuex'
import { getProjects, getCategories } from '@/services/rest'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    navOpen: false,
    projects: [],
    categories: []
  },
  mutations: {
    toggleNav (state) {
      state.navOpen = !state.navOpen
    },
    setProject (state, projects) {
      state.projects = projects
    },
    setCategories (state, categories) {
      state.categories = categories
    }
  },
  actions: {
    async getProjects ({ commit }) {
      commit('setProject', await getProjects())
    },
    async getCategories ({ commit }) {
      commit('setCategories', await getCategories())
    }
  },
  getters: {
    navOpen: state => state.navOpen,
    projects: state => state.projects,
    categories: state => state.categories
  }
})
