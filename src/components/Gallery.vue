<template>
  <div class="gallery-wrap">
    <div class="corousel-container" v-if="gallery.length">
      <Carousel
        :responsive="{0:{items:1}}"
        :items="1"
        :dots="false"
        :margin="11"
        :navText="nav"
        :loop="true"
        :autoplay="true"
        :autoplayTimeout="5000"
      >
        <div
          class="slide"
          v-for="(item, index) in gallery"
          :key="index"
        >
          <img v-lazy="apiUrl + item.path" alt="img">
        </div>
      </Carousel>
      <p class="text-center">
        Your reliable partner in architecture, interior design, brand development, furniture and design elements production with experience over 20 years.
      </p>
    </div>
  </div>
</template>

<script>
import Carousel from 'vue-owl-carousel'
import { getGallery } from '@/services/rest.js'
import { apiUrl } from '@/config'
export default {
  name: 'Gallery',
  components: {
    Carousel
  },
  data: () => ({
    gallery: [],
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    apiUrl
  }),
  async created () {
    this.gallery = await getGallery()
  }
}
</script>

<style scoped lang="scss">
  .gallery-wrap{
    position: relative;
    width: 100%;
    margin-top: 50px;
    margin-bottom: 50px;
    .slide {
      img{
        max-width: 100%;
        height: calc(100vh - 200px);
        object-fit: cover;
        filter: brightness(90%);
        @media(max-width: 767px) {
          height: 200px;
        }
      }
    }
    /deep/ .owl-prev {
      left: 5px;
      i {
        color: #fff;
        font-size: 42px;
      }
      @media(max-width: 767px) {
        left: -5px;
        i {
          font-size: 24px;
        }
      }
    }
    /deep/ .owl-next {
      right: 5px;
      i {
        color: #fff;
        font-size: 42px;
      }
      @media(max-width: 767px) {
        right: -5px;
        i {
          font-size: 24px;
        }
      }
    }
    /deep/ .owl-theme .owl-nav{
      display: none;
      @media(max-width: 767px) {
        display: block;
      }
    }
    p{
      font-size: 24px;
      margin: 0 auto;
      color: #000;
      margin-top: 40px;
      max-width: 600px;
    }
  }
</style>
