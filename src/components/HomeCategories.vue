<template>
  <div
    v-if="categories.length && projects.length"
    class="category-wrap"
  >
    <div
      v-for="category in categories"
      :key="category.id"
    >
    <div class="title-wrap">
      <h2>__{{category.category_name}}</h2>
    </div>
      <carousel
        :responsive="{0:{items:1},700:{items:2}, 800: {items:3}, 1300: {items: 3}}"
        :dots="false"
        :margin="11"
        :navText="nav"
        :loop="true"
        :autoplay="isMobile"
        :autoplayTimeout="3000"
      >
        <div class="gallery-block project" v-for="project in getProjectByCategories(category.id)" :key="project.name">
          <router-link :to="{name: 'Project', params: {id: project.id}}">
            <div class="overflow">
              <img :src="backendUrl + project.main_image" :alt="project.name" />
            </div>
            <div class="hover-block">
              <h2>{{project.name}}</h2>
            </div>
          </router-link>
        </div>
      </carousel>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Carousel from 'vue-owl-carousel'
import { apiUrl } from '@/config'
export default {
  name: 'HomeCategories',
  components: {
    Carousel
  },
  data: () => ({
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    backendUrl: apiUrl,
    isMobile: window.innerWidth < 700
  }),
  methods: {
    getProjectByCategories (id) {
      return this.projects.filter(project => project.category_ids.includes(id))
    }
  },
  computed: mapGetters({
    categories: 'categories',
    projects: 'projects'
  })
}
</script>

<style lang="scss" scoped>
.category-wrap{
  max-width: 100%;
  padding: 0 50px;
  margin: 0 auto;
  @media (max-width: 767px) {
    padding: 0 30px;
  }
  .gallery{
    margin-top: 60px;
  }
  .title-wrap {
    margin-top: 40px;
    h2{
      font-size: 32px;
      font-weight: 700;
      line-height: 79px;
      text-transform: uppercase;
      color: #000000;
      @media(max-width: 767px) {
        font-size: 24px;
      }
      @media(max-width: 576px) {
        font-size: 18px;
      }
    }
  }
  .project {
    a{
      position: relative;
      display: block;
      height: 100%;
      .overflow{
        height: 100%;
        img{
          height: 300px;
          width: 100%;
          object-fit: cover;
        }
      }
      .hover-block{
        opacity: 0;
        transition: opacity 0.3s;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(0deg, rgba(38, 157, 195, 0.65), rgba(38, 157, 195, 0.65));
        h2{
          font-size: 32px;
          font-weight: 500;
          line-height: 40px;
          text-align: center;
          text-transform: uppercase;
          color: #FFFFFF;
          text-align: center;
          max-width: 250px;
        }
      }
    }
    &:hover a .hover-block{
      opacity: 1;
    }
  }
}
@media(max-width: 767px) {
  .category-wrap .titel-ah h2{
    font-size: 44px;
    line-height: 1.2;
  }
  /deep/ .owl-carousel .owl-nav{
    display: none !important;
  }
}
@media(max-width: 575px) {
  .category-wrap .titel-ah h2{
    font-size: 24px;
    line-height: 1.2;
  }
}
</style>
