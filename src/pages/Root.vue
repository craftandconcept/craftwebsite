<template>
  <div :class="{'no-scroll': isLoaderVisible || loading}">
    <div class="main-wrap" id="wrap" :class="{'open': menuIsOpen}">
      <Header />
      <Navigation @toggleMenu="status => menuIsOpen = status" />
      <main class="container">
        <transition name="fade">
          <router-view/>
        </transition>
      </main>
      <Footer />
    </div>
    <transition name="fade">
      <Loader v-show="isLoaderVisible || loading"/>
    </transition>
  </div>
</template>

<script>
import Loader from '@/components/Loader'
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'
import { mapGetters } from 'vuex'
export default {
  components: {
    Loader,
    Header,
    Footer,
    Navigation
  },
  data: () => ({
    menuIsOpen: false,
    isLoaderVisible: false
  }),
  created () {
    this.isLoaderVisible = true
    this.$on('loadingStart', (patload) => { this.isLoaderVisible = true })
    this.$on('loadingFinish', (patload) => {
      setTimeout(() => { this.isLoaderVisible = false }, 1000)
    })
  },
  computed: mapGetters({
    loading: 'loading'
  })
}
</script>
<style lang="scss">
.no-scroll{
  max-height: 100vh;
  overflow: hidden;
}
.fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
  opacity: 0;
}
@media (max-width: 1200) {
  .container{
    max-width: 1170px;
  }
}
@media (min-width: 1400px) {
  .container{
    max-width: 1300px;
  }
}
@media (min-width: 1800px) {
  .container{
    max-width: 1600px;
  }
}
@media (min-width: 2000px) {
  .container{
    max-width: 1900px;
  }
}
.container {
  padding: 0 50px;
  @media(max-width: 767px) {
    padding: 0 15px;
  }
}
</style>
