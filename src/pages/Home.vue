<template>
  <div class="main-wrap" :class="{'open': menuIsOpen}">
    <Header />
    <Navigation @toggleMenu="status => menuIsOpen = status" />
    <main class="container-fluid">
      <router-link :to="{name: 'Home'}">{{$t('eng')}}</router-link>
      <br />
      <router-link :to="{name: 'Home-fr'}">{{$t('fre')}}</router-link>
      <br />
      <img src="../assets/img/shield.png" alt="">
      <p>{{$t('home-text-1')}}</p>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'
export default {
  name: 'Home',
  components: {
    Header,
    Footer,
    Navigation
  },
  data: () => ({
    menuIsOpen: false
  })
}
</script>

<style lang="scss">
.main-wrap{
  padding-left: 200px;
  height: 200vh;
  transition: all 0.3s;
  background: #f7f7f7;
  &.open{
    padding-left: 400px;
  }
}
</style>
