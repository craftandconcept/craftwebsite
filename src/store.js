import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    navOpen: false
  },
  mutations: {
    toggleNav (state) {
      state.navOpen = !state.navOpen
    }
  },
  actions: {
  },
  getters: {
    navOpen: state => state.navOpen
  }
})
