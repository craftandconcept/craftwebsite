<template>
  <div class="project-page" v-if="activeProject">
    <div class="title-bake">
      <h2>_{{activeProject.name}}</h2>
    </div>
    <div class="info-project">
      <div class="main-img-wrap">
        <img v-lazy="backendUrl + activeProject.main_image" :alt="activeProject.name">
      </div>
      <div class="left">
        <div class="categories">
          <p v-show="activeProject.main_description"><span>Project:</span> {{activeProject.main_description}}</p>
          <!-- <p>
            <span>Category:</span>
            <label v-for="(category, index) in activeProject.category_name" :key="index" class="mr-2">
              {{category}}
            </label>
          </p> -->
          <p v-show="activeProject.creators"><span>Creators:</span> {{activeProject.creators}}</p>
          <p v-show="activeProject.collaborators"><span>Collaborators:</span> {{activeProject.collaborators}}</p>
          <p>
            <span>Location:</span>
            <label v-show="activeProject.city" class="mr-1">{{activeProject.city + ', '}}</label>
            <label>{{activeProject.country_name}}</label>
          </p>
          <p v-show="activeProject.function"><span>Function:</span> {{activeProject.function}}</p>
        </div>
        <div class="categories">
          <p v-show="activeProject.size"><span>Size:</span> {{activeProject.size}}</p>
          <p v-show="activeProject.status"><span>Status:</span> {{activeProject.status}}</p>
          <p v-show="activeProject.photos_by"><span>Photos:</span> {{activeProject.photos_by}}</p>
        </div>
      </div>
    </div>
    <div class="text-project" v-show="activeProject.main_text">
      <p>{{activeProject.main_text}}</p>
    </div>
    <div v-for="(image, index) in activeProject.images" :key="index" :class="image.full ? 'img-project' : 'plan-project'">
      <img v-lazy="backendUrl + image.img" :alt="'image-' + index">
      <p>{{image.text}}</p>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import { apiUrl } from '@/config'
export default {
  name: 'ProjectPage',
  data: () => ({
    backendUrl: apiUrl
  }),
  async created () {
    this.$parent.$emit('loadingStart')
    if (!this.projects.length) {
      await this.getProjects()
    }
    this.$parent.$emit('loadingFinish')
  },
  computed: {
    ...mapGetters({
      projects: 'projects'
    }),
    activeProject () {
      return this.projects.find(item => +item.id === +this.$route.params.id)
    }
  },
  methods: {
    ...mapActions({
      getProjects: 'getProjects'
    })
  }
}
</script>

<style lang="scss">
.project-page{
  .title-bake{
    font-weight: 700;
    margin-top: 85px;
    margin-bottom: 60px;
    h2{
      font-size: 64px;
      line-height: 79px;
      text-transform: uppercase;
      color: #000000;
    }
  }
  .info-project{
    display: flex;
    flex-wrap: wrap;
    .main-img-wrap{
      width: 100%;
      display: flex;
      justify-content: center;
      img{
        max-width: 100%;
        margin-bottom: 30px;
        max-height: 100vh;
        object-fit: contain;
      }
    }
    .left,
    .right{
      width: 50%;
      display: flex;
      flex-direction: column;
      margin-left: 25%;
      .categories{
        p{
          display: flex;
          align-items: flex-start;
          flex-wrap: wrap;
          font-size: 12px;
          line-height: 15px;
          text-transform: uppercase;
          color: #000000;
          font-weight: 500;
          margin-bottom: 8px;
          span{
            font-weight: 400;
            color: #424647;
            display: block;
            min-width: 120px;
            margin-right: 10px;
          }
          label{
            margin-bottom: 0;
          }
        }
      }
      @media(max-width: 767px) {
        margin-left: 0;
      }
    }
  }
  .text-project{
    margin-top: 10px;
    max-width: 40%;
    margin-left: 25%;
    @media(max-width: 767px) {
      max-width: 100%;
      margin-left: 0;
    }
    p{
      font-size: 16px;
      font-weight: 400;
      line-height: 24px;
      color: #424647;
    }
  }
  .plan-project{
    margin-top: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    img{
      width: 60%;
      margin-bottom: 70px;
    }
  }
  .img-project{
    margin: 100px 0 30px;
    @media(max-width: 767px) {
      margin: 25px 0 10px;
    }
    p{
      padding-top: 10px;
      margin: 0 auto;
      width: 50%;
      font-weight: 400;
      padding-left: 15px;
      font-size: 14px;
      line-height: 18px;
      color: #424647;
      @media(max-width: 900px) {
        width: 100%;
        padding-left: 0;
      }
    }
    img{
      width: 100%;
      margin-bottom: 70px;
      max-height: 100vh;
      object-fit: contain;
      @media(max-width: 767px) {
        margin-bottom: 10;
      }
    }
  }
}
@media(min-width: 1400px) {
  .project-page{
    .info-project{
      .left .categories,
      .right .categories{
        p{
          font-size: 0.9vw;
          line-height: 1.4;
        }
      }
      .left .form-categories,
      .right .form-categories{
        p{
          font-size: 0.9vw;
          line-height: 1.4;
        }
      }
    }
    .img-project{
      .wrap-img-project p{
        font-size: 1.1vw;
        line-height: 1.4;
      }
    }
    .title-bake h2{
      font-size: 4vw;
      line-height: 1.4;
    }
    .info-project{
      .left,
      .right{
        width: 40%;
      }
    }
  }
}
@media(max-width: 1200px){
  .project-page{
    .info-project{
      .left,
      .right{
        .categories{
          p{
            white-space: unset;
          }
        }
      }
    }
  }
}
@media(max-width: 992px){
  .project-page{
    .title-bake h2{
      font-size: 45px;
    }
    .info-project{
      .left,
      .right{
        width: 100%;
      }
    }
  }
}
@media(max-width: 767px){
  .project-page{
    .title-bake{
      h2{
        font-size: 40px;
      }
    }
    .plan-project{
      margin-top: 30px;
      img{
        max-width: 100%;
        max-height: 100vh;
      }
    }
  }
}
@media(max-width: 575px) {
  .project-page{
    .title-bake {
      margin: 20px 0;
      h2{
        font-size: 21px;
        line-height: 1.2;
      }
    }
    .info-project{
      .left, .right{
        .categories p{
          font-size: 11px;
          span{
            min-width: unset;
          }
        }
      }
    }
    .plan-project {
      img {
        width: 100%;
      }
    }
    .img-project .wrap-img-project p {
      padding-left: 0;
    }
  }
}
</style>
