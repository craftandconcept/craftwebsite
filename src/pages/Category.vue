<template>
<div class="category-wrap">
  <div class="titel-ah">
    <h2>_{{$t($route.params.name)}}</h2>
  </div>
  <div class="gallery d-flex flex-wrap" v-if="getFiltredProject.length">
    <div class="gallery-block project" v-for="(project, index) in getFiltredProject" :key="index">
      <router-link :to="{name: 'Project', params: {id: project.id}}">
        <div class="overflow">
          <img :src="project.main_image" :alt="project.name" />
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
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'Category',
  computed: {
    ...mapGetters({
      projects: 'projects'
    }),
    getFiltredProject () {
      return this.projects.filter(item => {
        return (item.category_name.filter(category => category.toLowerCase() === this.$route.params.name)).length
      })
    }
  },
  async created () {
    this.$parent.$emit('loadingStart')
    if (!this.projects.length) {
      this.getProjects()
    }
    this.$parent.$emit('loadingFinish')
  },
  methods: {
    ...mapActions({
      getProjects: 'getProjects'
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
}
@media(max-width: 575px) {
  .category-wrap .titel-ah h2{
    font-size: 24px;
    line-height: 1.2;
  }
}
</style>
