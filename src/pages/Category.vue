<template>
<div class="category-wrap" id="top">
  <div class="titel-ah">
    <h2>_{{getCategoryName}}</h2>
  </div>
  <div class="category d-flex flex-wrap" v-if="getFiltredProject.length">
    <div
      class="category-block project"
      v-for="(project, index) in getFiltredProject"
      :key="index"
      :class="{'show': index < currentPage * 12}">
      <router-link :to="{name: 'Project', params: {id: project.id}}">
        <div class="overflow">
          <img :src="backendUrl + project.main_image" :alt="project.name" />
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
    backendUrl: apiUrl,
    currentPage: 1,
    pageCount: 1
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
  mounted () {
    this.updatePageCount()
    window.addEventListener('scroll', this.scrollHandle)
  },
  watch: {
    $route () {
      this.updatePageCount()
    }
  },
  methods: {
    ...mapActions({
      getProjects: 'getProjects',
      getCategories: 'getCategories'
    }),
    updatePageCount () {
      this.currentPage = 1
      this.pageCount = Number((this.getFiltredProject.length / 12).toFixed(0))
      this.$scrollTo('#top')
    },
    scrollHandle (e) {
      if (document.documentElement.scrollHeight < document.documentElement.clientHeight + window.pageYOffset + 200) {
        this.currentPage++
      }
    }
  }
}
</script>

<style lang="scss">
.category{
  margin-top: 155px;
  margin-bottom: 80px;
  margin-right: -10px;
  margin-left: -10px;
  .category-block{
    width: 33.3%;
    padding: 0 10px 45px;
    text-decoration: none;
    display: none;
    &.show {
      display: block;
    }
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
.category-wrap{
  .category{
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
