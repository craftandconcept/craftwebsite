<template>
  <div>
    <Gallery />
    <h2 class="project-map-title">
      __{{$t('project')}}
      {{$t('map')}}
      <br />
      <span>{{$t('Click-to-find-out-more')}}</span>
    </h2>
    <Map :countryList="countryList" v-if="countryList.length"/>
    <div class="project-counter d-flex" id="number">
      <div class="project-col">
        <h3>{{numberAnimation[0]}}</h3>
        <p>{{$t('country-of-operations')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[1]}}</h3>
        <p>{{$t('projects')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[2]}}</h3>
        <p>{{$t('realized-project')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[3]}}</h3>
        <p>{{$t('creators-and-team')}}</p>
      </div>
    </div>
    <!-- <div class="our-story d-flex">
      <div class="title-story left d-flex">
        <h2>
          — {{$t('our')}} <br />
          {{$t('story')}}
        </h2>
      </div>
      <div class="text-story right align-items-center ">
        <p>{{$t('text-1')}}</p>
        <p>{{$t('text-2')}}</p>
        <p>{{$t('text-3')}}</p>
        <p>{{$t('text-4')}}</p>
      </div>
    </div> -->
    <div class="gallery d-flex flex-wrap">
      <router-link to="/category/1" class="gallery-block">
        <h3>_{{$t('architecture')}}</h3>
        <div class="overflow">
          <img src="../assets/img/Architecture.jpeg" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/2" class="gallery-block">
        <h3>_{{$t('interior-design')}}</h3>
        <div class="overflow">
          <img src="../assets/img/Interiourdesign.jpg" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/3" class="gallery-block">
        <h3>_{{$t('individual-objects')}}</h3>
        <div class="overflow">
          <img src="../assets/img/Individualobjects.jpg" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/5" class="gallery-block">
        <h3>_{{$t('brand-development')}}</h3>
        <div class="overflow">
          <img src="../assets/img/Branddevelopment.jpg" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/4" class="gallery-block">
        <h3>_{{$t('3d-rendering')}}</h3>
        <div class="overflow">
          <img src="../assets/img/3Drenderings.jpg" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/6" class="gallery-block">
        <h3>_{{$t('production-facilities')}}</h3>
        <div class="overflow">
          <img src="../assets/img/Productionfacilities.jpg" alt="gallery" />
        </div>
      </router-link>
    </div>
    <div class="d-flex justify-content-center">
      <OurStory id="ourStory" />
    </div>
    <HomeCategories />
    <Teams id="teams" />
    <Creators id="creators" />
    <Collaborators id="collaborators" />
  </div>
</template>

<script>
import Map from '@/components/Map.vue'
import { mapGetters, mapActions } from 'vuex'
import countryesCod from '@/models/countryCod.js'
import Creators from '@/components/Creators.vue'
import Collaborators from '@/components/Collaborators.vue'
import Teams from '@/components/Teams.vue'
import OurStory from '@/components/OurStory'
import HomeCategories from '@/components/HomeCategories'
import Gallery from '@/components/Gallery'
export default {
  name: 'Home',
  components: {
    Map,
    Creators,
    Collaborators,
    Teams,
    OurStory,
    HomeCategories,
    Gallery
  },
  data: () => ({
    numberAnimation: [0, 0, 0, 0],
    countryList: []
  }),
  async created () {
    this.$parent.$emit('loadingStart')
    this.getCategories()
    if (!this.projects.length) {
      await this.getProjects()
    }
    this.filterProjectByCountry()
    this.$parent.$emit('loadingFinish')
    setTimeout(this.initialization, 1500)
  },
  mounted () {
    setTimeout(() => {
      if (this.$route.params.anchor) {
        this.$scrollTo(this.$route.params.anchor)
      }
    }, 700)
  },
  methods: {
    ...mapActions({
      getProjects: 'getProjects',
      getCategories: 'getCategories'
    }),
    initialization () {
      let animationStart = false
      let clientHeight = document.documentElement.clientHeight
      let scrollToTopFromElement = document.getElementById('number').offsetTop
      const scrollCallback = () => {
        let currentScrollToTop = window.pageYOffset
        if (scrollToTopFromElement - clientHeight < currentScrollToTop - 40 && !animationStart) {
          this.animateNumber()
          animationStart = true
        }
      }
      document.addEventListener('scroll', scrollCallback)
      scrollCallback()
    },
    animateNumber () {
      let step = 5
      let values = [20, 500, 450, 71]
      let numberAnimationIsFinish = [false, false, false, false]
      this.numberAnimation = this.numberAnimation.map((num, i) => {
        if (num + 5 < values[i]) {
          num += step
        } else {
          num = values[i]
          numberAnimationIsFinish[i] = true
        }
        return num
      })
      if (numberAnimationIsFinish.find(item => !item) === false) {
        setTimeout(() => {
          this.animateNumber()
        }, 100)
      }
    },
    filterProjectByCountry () {
      const country = {}
      this.projects.map(project => {
        if (!country[project.country_name]) {
          country[project.country_name] = []
        }
        country[project.country_name].push({ name: project.name, id: project.id })
      })
      let i = 0
      let countryList = []
      for (let key in country) {
        countryList[i] = {
          countryCod: countryesCod[key],
          country: key,
          projectList: country[key]
        }
        i++
      }
      this.countryList = countryList
    }
  },
  watch: {
    navOpen () {
      window.dispatchEvent(new Event('resize'))
    }
  },
  computed: mapGetters({
    projects: 'projects',
    navOpen: 'navOpen'
  })
}
</script>

<style lang="scss">
.main-wrap{
  padding-left: 74px;
  transition: all 0.3s;
  &.open{
    padding-left: 271px;
    &.unset-padding-left{
      padding-left: 109px;
      transition: unset;
    }
  }
  background: #fff;
  .project-map-title {
    font-size: 2.2vw;
    line-height: 1;
    color: #000000;
    text-transform: uppercase;
    font-weight: 700;
    white-space: nowrap;
    span {
      font-size: 18px;
      @media(max-width: 576px) {
        font-size: 14px;
      }
    }
    @media(max-width: 767px) {
      font-size: 24px;
    }
    @media(max-width: 576px) {
      font-size: 18px;
    }
  }
  main{
    min-height: calc(100vh - 379px);
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
      min-width: 110px;
      h3{
        font-size: 64px;
        font-weight: 700;
        line-height: 79px;
        color: #000000;
      }
      p{
        font-size: 18px;
        font-weight: 400;
        line-height: 22px;
        text-transform: uppercase;
        color: #424647;
      }

    }
  }
  .our-story{
    padding-left: 15%;
    .title-story h2{
      font-size: 64px;
      line-height: 79px;
      color: #000000;
      text-transform: uppercase;
      padding-right: 50px;
      font-weight: 700;
      white-space: nowrap;
    }
    .text-story{
      padding-top: 100px;
      p{
        max-width: 600px;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #424647;
      }
    }
  }
  .gallery{
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
      }
      &:hover{
        img{
          transform: scale(1.2);
        }
      }
    }
  }
  .owl-carousel .owl-nav.disabled{
    display: block;
  }
}
@media(max-width: 1200px) {
  .main-wrap{
    padding-left: 80px;
    &.open{
      padding-left: 330px;
      &.unset-padding-left{
        padding-left: 80px;
      }
    }
    .project-counter{
      padding-left: 5%;
      .project-col {
        margin-right: 9%;
      }
    }
    .our-story{
      flex-direction: column;
      padding-left: 5%;
      .text-story{
        padding-top: 55px;
      }
    }
  }
}
@media(max-width: 992px) {
  .main-wrap{
    &.open{
      padding-left: 295px;
      &.unset-padding-left{
        padding-left: 80px;
      }
    }
    .project-counter{
      padding-left: 0;
      .project-col {
        margin-right: 5vw;
        min-width: 11vw;
        h3{
          font-size: 6vw;
        }
        p{
          font-size: 1.8vw;
        }
      }
    }
    .our-story{
      padding-left: 0;
    }
    .gallery{
      .gallery-block{
        width: 50%;
      }
    }
  }
}
@media(max-width: 767px) {
  .header{
    margin-bottom: 16px;
  }
  .main-wrap{
    &.open{
      padding-left: 80px;
    }
    .project-counter{
      flex-wrap: wrap;
      margin-bottom: 25px;
      margin-top: 25px;
      .project-col{
        max-width: unset;
        width: 45%;
        margin-right: 10%;
        max-width: unset;
        &:nth-child(2n){
          margin-right: 0;
        }
        h3{
          font-size: 60px;
        }
        p{
          font-size: 18px;
        }
      }
    }
    .our-story .text-story {
      padding-top: 25px;
    }
    .gallery{
      margin-top: 50px;
      margin-bottom: 0px;
      .gallery-block{
        width: 100%;
        h3{
          font-size: 14px;
        }
      }
    }
  }
  .our-story-info .title-our-story h2,
  .main-wrap .project-map-title,
  .title{
    font-size: 46px;
  }
}
@media(max-width: 576px) {
  .main-wrap{
    .header {
      padding: 7px 0 0;
    }
    .project-counter{
      flex-wrap: wrap;
     .project-col{
        width: 100%;
        margin-right: 0;
        text-align: center;
        h3{
          font-size: 40px;
        }
        p{
          font-size: 14px;
        }
      }
    }
    .our-story{
      .title-story h2{
        font-size: 40px;
        padding-right: 0;
      }
      .text-story p {
        font-size: 14px;
      }
    }
  }
  .our-story-info .title-our-story h2,
  .main-wrap .project-map-title,
  .title{
    font-size: 24px;
  }
  .main-wrap .project-map-title span{
    font-size: 16px;
  }
}
</style>
