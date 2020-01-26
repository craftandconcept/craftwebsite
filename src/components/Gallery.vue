<template>
  <div class="gallery-wrap">
    <div class="corousel-container" v-if="gallery.length">
      <Carousel
        :responsive="{0:{items:1}}"
        :items="1"
        :dots="false"
        :loop="true"
        :autoplay="true"
        :autoplayTimeout="5000"
        :autoplayHoverPause="true"
        :nav="false"
      >
        <div
          class="slide"
          v-for="(item, index) in gallery"
          :key="index"
        >
          <img :src="apiUrl + item.path" alt="img" v-if="item.path">
          <iframe :src="item.link" v-if="item.link" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
import { mapMutations } from 'vuex'
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
    this.loadingSwitch(true)
    this.gallery = await getGallery()
    this.loadingSwitch(false)
  },
  methods: mapMutations({
    loadingSwitch: 'loadingSwitch'
  })
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
      iframe {
        height: calc(100vh - 200px);
        width: 100%;
      }
    }
    p{
      font-size: 20px;
      margin: 0 auto;
      color: #000;
      margin-top: 40px;
      max-width: 600px;
      @media(max-width: 767px) {
        font-size: 16px;
      }
    }
    /deep/ .owl-item{
      padding-right: 0;
    }
    /deep/ .owl-carousel .owl-nav.disabled {
      display: none;
    }
  }
</style>
