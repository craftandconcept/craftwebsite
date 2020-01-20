<template>
  <div class="home-category d-flex flex-wrap" v-if="categories.length">
    <router-link
      class="gallery-block"
      v-for="category in categories"
      :key="category.id"
      :to="`/category/${category.id}`"
      v-show="category.category_name !== 'Featured projects'">
      <h3>_{{category.category_name}}</h3>
      <div class="overflow">
        <img :src="backendUrl + category.image" :alt="category.category_name" />
      </div>
    </router-link>
  </div>
</template>

<script>
import { apiUrl } from '@/config'
import { mapGetters } from 'vuex'

export default {
  name: 'HomeCategory',
  data: () => ({
    backendUrl: apiUrl
  }),
  computed: mapGetters({
    categories: 'categories'
  })
}
</script>

<style lang="scss">
.home-category{
  margin-top: 155px;
  margin-bottom: 80px;
  margin-right: -10px;
  margin-left: -10px;
  .gallery-block{
    width: 33.3%;
    padding: 0 10px 45px;
    text-decoration: none;
    .overflow{
      overflow: hidden;
    }
    img{
      width: 100%;
      height: 250px;
      object-fit: cover;
      transform: scale(1);
      transition: transform .3s;
    }
    h3{
      font-size: 18px;
      font-weight: 500;
      line-height: 15px;
      text-transform: uppercase;
      color: #000000;
      @media(max-width: 767px) {
        font-size: 14px;
      }
    }
    &:hover{
      img{
        transform: scale(1.2);
      }
    }
    @media(max-width: 992px) {
      width: 50%;
    }
    @media(max-width: 767px) {
      width: 100%;
    }
  }
  @media(max-width: 767px) {
      margin-top: 50px;
      margin-bottom: 0px;
  }
}
</style>
