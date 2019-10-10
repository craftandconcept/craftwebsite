<template>
  <div class="main-wrap" :class="{'open': menuIsOpen}">
    <Header />
    <Navigation @toggleMenu="status => menuIsOpen = status" />
    <main class="container-fluid">
      <div class="maps-bg">
        <img src="../assets/img/map.png" alt="map">
      </div>

      <!-- <img src="../assets/img/shield.png" alt="">
      <p>{{$t('home-text-1')}}</p> -->
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
  padding-left: 150px;
  transition: all 0.3s;
  background: #f7f7f7;
  &.open{
    padding-left: 420px;
  }
  .maps-bg{
    width: 100%;
    img{
      width: 100%;
    }
  }
}
</style>
