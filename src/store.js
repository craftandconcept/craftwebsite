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
      console.log(process.env.VUE_APP_API_URL)
      let projects = (await axios.get(`${process.env.VUE_APP_API_URL}/api/v1`)).data.data
      commit('setProject', projects)
    }
  },
  getters: {
    navOpen: state => state.navOpen,
    projects: state => state.projects
  }
})
