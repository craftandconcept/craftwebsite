<template>
<div class="category-wrap">
  <div class="titel-ah">
    <h2>_{{getCategoryName}}</h2>
  </div>
  <div class="gallery d-flex flex-wrap" v-if="getFiltredProject.length">
    <div class="gallery-block project" v-for="(project, index) in getFiltredProject" :key="index">
      <router-link :to="{name: 'Project', params: {id: project.id}}">
        <div class="overflow">
          <img v-lazy="backendUrl + project.main_image" :alt="project.name" />
        </div>
        <div class="hover-block">
          <h2>{{project.name}}</h2>
        </div>
      </router-link>
    </div>
  </div>
</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import { apiUrl } from '@/config'
export default {
  name: 'Category',
  data: () => ({
    backendUrl: apiUrl
  }),
  computed: {
    ...mapGetters({
      projects: 'projects',
      categories: 'categories'
    }),
    getFiltredProject () {
      return this.projects.filter(item => {
        return item.category_ids.includes(+this.$route.params.id)
      })
    },
    getCategoryName () {
      return this.categories.length ? (this.categories.find(category => category.id === +this.$route.params.id)).category_name : ''
    }
  },
  async created () {
    this.$parent.$emit('loadingStart')
    if (!this.projects.length) {
      this.getProjects()
    }
    if (!this.categories.length) {
      this.getCategories()
    }
    this.$parent.$emit('loadingFinish')
  },
  methods: {
    ...mapActions({
      getProjects: 'getProjects',
      getCategories: 'getCategories'
    })
  }
}
</script>

<style lang="scss">
.category-wrap{
  .gallery{
    margin-top: 60px;
  }
  .titel-ah {
    margin-top: 85px;
    h2{
      font-size: 64px;
      font-weight: 700;
      line-height: 79px;
      text-transform: uppercase;
      color: #000000;
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
        background: rgba(0, 0, 0, 0.6);
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
}
@media(max-width: 575px) {
  .category-wrap .titel-ah h2{
    font-size: 24px;
    line-height: 1.2;
  }
}
</style>
