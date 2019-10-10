<template>
  <div class="main-wrap" :class="{'open': menuIsOpen}">
    <Header />
    <Navigation @toggleMenu="status => menuIsOpen = status" />
    <main class="container-fluid">
      <Map />
      <!-- <img src="../assets/img/shield.png" alt="">
      <p>{{$t('home-text-1')}}</p> -->
      <div class="project-counter d-flex">
        <div class="project-col">
          <h3>8</h3>
          <p>Country of Operations</p>
        </div>
        <div class="project-col">
          <h3>500</h3>
          <p>Projects</p>
        </div>
        <div class="project-col">
          <h3>450</h3>
          <p>Realized Projects</p>
        </div>
        <div class="project-col">
          <h3>12</h3>
          <p>Creators and Team </p>
        </div>
      </div>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Navigation from '@/components/Navigation.vue'
import Map from '@/components/Map.vue'
export default {
  name: 'Home',
  components: {
    Header,
    Footer,
    Navigation,
    Map
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
  .project-counter{
    padding-left: 15%;
    margin-bottom: 120px;
    margin-top: 40px;
    .project-col{
      margin-right: 10%;
      text-align: left;
      max-width: 130px;
      h3{
        font-size: 64px;
        line-height: 79px;
        color: #000000;
      }
      p{
        font-size: 18px;
        line-height: 22px;
        text-transform: uppercase;
        color: #424647;
      }

    }
    
  }
}
</style>
