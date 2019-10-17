<template>
  <div :class="{'no-scroll': isLoaderVisible}">
    <div class="main-wrap" :class="{'open': menuIsOpen}">
      <Header />
      <Navigation @toggleMenu="status => menuIsOpen = status" />
      <main class="container-fluid">
        <transition name="fade">
          <router-view/>
        </transition>
      </main>
      <Footer />
    </div>
    <transition name="fade">
      <Loader v-show="isLoaderVisible"/>
    </transition>
  </div>
</template>

<script>
import Loader from '@/components/Loader'
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'
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
    if (this.$route.name !== 'Home-fr') {
      this.$i18n.locale = 'en'
    } else {
      this.$i18n.locale = 'fr'
    }
    setTimeout(() => { this.isLoaderVisible = false }, 2000)
  },
  watch: {
    '$route.name' () {
      if (this.$route.name !== 'Home-fr') {
        this.$i18n.locale = 'en'
      } else {
        this.$i18n.locale = 'fr'
      }
    }
  }
}
</script>
<style>
.no-scroll{
  max-height: 100vh;
  overflow: hidden;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
  opacity: 0;
}
</style>
