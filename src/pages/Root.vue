<template>
  <div :class="{'no-scroll': isLoaderVisible}">
    <router-view/>
    <transition name="fade">
      <Loader v-show="isLoaderVisible"/>
    </transition>
  </div>
</template>

<script>
import Loader from '@/components/Loader'
export default {
  components: {
    Loader
  },
  data: () => ({
    isLoaderVisible: false
  }),
  created () {
    this.isLoaderVisible = true
    if (this.$route.name === 'Home') {
      this.$i18n.locale = 'en'
    } else {
      this.$i18n.locale = 'fr'
    }
    setTimeout(() => { this.isLoaderVisible = false }, 2000)
  },
  watch: {
    '$route.name' () {
      if (this.$route.name === 'Home') {
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
