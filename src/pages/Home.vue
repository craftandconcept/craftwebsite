<template>
  <div>
    <Gallery />
    <div v-if="!loading">
      <h2 class="project-map-title">
        __{{$t('project')}}
        {{$t('map')}}
        <br />
        <span>{{$t('Click-to-find-out-more')}}</span>
      </h2>
      <Map :countryList="countryList" v-if="countryList.length"/>
      <div class="project-counter d-flex justify-content-center" id="number">
        <div class="project-col">
          <h3>{{numberAnimation[0]}}</h3>
          <p>{{$t('country-of-operations')}}</p>
        </div>
        <div class="project-col">
          <h3>{{numberAnimation[1]}}+</h3>
          <p>{{$t('projects')}}</p>
        </div>
        <div class="project-col">
          <h3>{{numberAnimation[2]}}</h3>
          <p>{{$t('realized-project')}}</p>
        </div>
        <div class="project-col">
          <h3>{{numberAnimation[3]}}+</h3>
          <p>{{$t('creators-and-team')}}</p>
        </div>
      </div>
      <HomeCategory />
      <div class="d-flex justify-content-center">
        <OurStory id="ourStory" />
      </div>
      <FeaturedProjects :load="loadScroll"/>
      <Teams id="teams" :load="loadScroll"/>
      <Creators id="creators" :load="loadScroll"/>
      <Collaborators id="collaborators" :load="loadScroll"/>
    </div>
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
import FeaturedProjects from '@/components/FeaturedProjects'
import Gallery from '@/components/Gallery'
import HomeCategory from '@/components/HomeCategory'

export default {
  name: 'Home',
  components: {
    Map,
    Creators,
    Collaborators,
    Teams,
    OurStory,
    FeaturedProjects,
    Gallery,
    HomeCategory
  },
  data: () => ({
    numberAnimation: [0, 0, 0, 0],
    countryList: [],
    loadScroll: false
  }),
  async created () {
    this.getCategories()
    if (!this.projects.length) {
      await this.getProjects()
    }
    this.filterProjectByCountry()
    setTimeout(() => { this.loadScroll = true }, 5000)
    this.$parent.$emit('loadingFinish')
  },
  mounted () {
    setTimeout(() => {
      if (this.$route.params.anchor) {
        this.loadScroll = true
        setTimeout(() => this.$scrollTo(this.$route.params.anchor), 500)
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
          this.loadScroll = true
          document.removeEventListener('scroll', scrollCallback)
        }
      }
      document.addEventListener('scroll', scrollCallback)
      scrollCallback()
    },
    animateNumber () {
      let step = 8
      let values = [19, 200, 62, 20]
      let numberAnimationIsFinish = [false, false, false, false]
      this.numberAnimation = this.numberAnimation.map((num, i) => {
        if (num + step < values[i]) {
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
        }, 30)
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
    },

    loading (loading) {
      if (!loading) {
        setTimeout(this.initialization, 1500)
      }
    }
  },
  computed: mapGetters({
    projects: 'projects',
    navOpen: 'navOpen',
    loading: 'loading'
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
      &:last-child {
        margin-right: 0;
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
  }
}
@media(max-width: 767px) {
  .header{
    margin-bottom: 16px;
  }
  .main-wrap{
    padding-left: 0;
    &.open {
      padding-left: 0;
    }
    .project-counter{
      flex-wrap: wrap;
      margin-bottom: 25px;
      margin-top: 0;
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
