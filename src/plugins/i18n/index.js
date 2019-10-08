import Vue from 'vue'
import VueI18n from 'vue-i18n'
import en from './en'
import fr from './fr'

Vue.use(VueI18n)

const messages = {
  en,
  fr
}

export default new VueI18n({
  locale: 'en',
  messages
})