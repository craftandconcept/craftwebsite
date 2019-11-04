<template>
  <div class="project-page" v-if="activeProject">
    <div class="title-bake">
      <h2>_{{activeProject.name}}</h2>
    </div>
    <div class="info-project">
      <div class="left">
        <div class="categories">
          <p><span>Architecture Project:</span> Aloft</p>
          <p><span>Category:</span> Architecture</p>
          <p><span>Creators:</span> Drozdov&Partners</p>
          <p><span>Collaborators:</span> Jestico +Whiles, RD Engineering</p>
          <p><span>Location:</span> Kiev, Ukraine</p>
          <p><span>Function:</span> Hotel</p>
        </div>
      </div>
      <div class="right">
        <div class="categories">
          <p><span>Size:</span> 20,000 m2</p>
          <p><span>Status:</span> built 2010 - 2018</p>
          <p><span>Photos:</span> by Andrey Avdeenko</p>
        </div>
      </div>
    </div>
    <div class="text-project">
      <p>The house is located on a clearing inside an oak-tree forest that is homogenous in its structure. Much in the same way as flat steppe, the homogenous dendrology of the forest is far from being a simple setting for developing a scenario. Therefore, as long as we define the forest as an “occupied” place, we introduce the empty space of the peristyle as an “antithesis” to it.</p>
    </div>
    <div class="plan-project">
      <img src="../assets/img/plan.png" alt="plan">
    </div>
    <div class="img-project">
      <div class="wrap-img-project">
        <img src="../assets/img/img-project-1.png" alt="img-project">
        <p>The sloping terrain causes the gradual increase of the volume, unfolding the entire narrative of the house. Starting from the entrance and low minor premises on the street level, the scale grows bigger in bedrooms and reaches its apex in the spacious living room.</p>
      </div>
      <div class="wrap-img-project">
        <img src="../assets/img/img-project-2.png" alt="img-project">
        <p>The sloping terrain causes the gradual increase of the volume, unfolding the entire narrative of the house. Starting from the entrance and low minor premises on the street level, the scale grows bigger in bedrooms and reaches its apex in the spacious living room.</p>
      </div>
      <div class="wrap-img-project">
        <img src="../assets/img/img-project-3.png" alt="img-project">
        <p>The sloping terrain causes the gradual increase of the volume, unfolding the entire narrative of the house. Starting from the entrance and low minor premises on the street level, the scale grows bigger in bedrooms and reaches its apex in the spacious living room.</p>
      </div>
      <div class="wrap-img-project">
        <img src="../assets/img/img-project-4.png" alt="img-project">
        <p>The sloping terrain causes the gradual increase of the volume, unfolding the entire narrative of the house. Starting from the entrance and low minor premises on the street level, the scale grows bigger in bedrooms and reaches its apex in the spacious living room.</p>
      </div>
    </div>

  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
  name: 'ProjectPage',
  async created () {
    this.$parent.$emit('loadingStart')
    if (!this.projects.length) {
      await this.getProjects()
    }
    this.setActiveProject()
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
    .left,
    .right{
      width: 50%;
      display: flex;
      flex-wrap: wrap;
      .categories{
        p{
          display: flex;
          align-items: flex-start;
          white-space: nowrap;
          font-size: 12px;
          line-height: 15px;
          text-transform: uppercase;
          color: #000000;
          font-weight: 500;
          span{
            font-weight: 400;
            color: #424647;
            display: block;
            min-width: 120px;
            margin-right: 10px;
          }
        }
      }
    }
  }
  .text-project{
    margin-top: 70px;
    p{
      font-size: 16px;
      font-weight: 400;
      line-height: 24px;
      text-transform: capitalize;
      color: #424647;
    }
  }
  .plan-project{
    margin-top: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    img{
      width: 70%;
    }
  }
  .img-project{
    margin: 100px 0 30px;
    .wrap-img-project{
      padding-bottom: 70px;
      p{
        padding-top: 10px;
        margin: 0;
        font-weight: 400;
        padding-left: 15px;
        font-size: 14px;
        line-height: 18px;
        text-transform: capitalize;
        color: #424647;
      }
      img{
        width: 100%;
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
      margin: 40px 0;
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
