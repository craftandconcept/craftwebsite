import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    navOpen: false,
    projects: []
  },
  mutations: {
    toggleNav (state) {
      state.navOpen = !state.navOpen
    },
    setProject (state, projects) {
      state.projects = projects
    }
  },
  actions: {
    async getProjects ({ commit }) {
      let projects = (await axios.get(`https://backend.dev.concept-and-craft.develop-test-alterrasoft.com/api/v1`)).data.data
      commit('setProject', projects)
    }
  },
  getters: {
    navOpen: state => state.navOpen,
    projects: state => state.projects
  }
})
