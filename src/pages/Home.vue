<template>
  <div>
    <Map />
    <div class="project-counter d-flex" id="number">
      <div class="project-col">
        <h3>{{numberAnimation[0]}}</h3>
        <p>{{$t('Country-of-Operations')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[1]}}</h3>
        <p>{{$t('Projects')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[2]}}</h3>
        <p>{{$t('Realized-Project')}}</p>
      </div>
      <div class="project-col">
        <h3>{{numberAnimation[3]}}</h3>
        <p>{{$t('Creators-and-Team')}}</p>
      </div>
    </div>
    <div class="our-story d-flex">
      <div class="title-story left d-flex">
        <h2>
          — {{$t('OUR')}} <br />
          {{$t('STORY')}}
        </h2>
      </div>
      <div class="text-story right align-items-center ">
        <p>{{$t('text-1')}}</p>
        <p>{{$t('text-2')}}</p>
        <p>{{$t('text-3')}}</p>
        <p>{{$t('text-4')}}</p>
      </div>
    </div>
    <div class="gallery d-flex flex-wrap">
      <router-link to="/category/architecture" class="gallery-block">
        <h3>_{{$t('Architecture')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-1.png" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/interior-design" class="gallery-block">
        <h3>_{{$t('Interior-Design')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-2.png" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/individual-object" class="gallery-block">
        <h3>_{{$t('Individual-Objects')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-3.png" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/brand-development" class="gallery-block">
        <h3>_{{$t('Brand-Development')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-4.png" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/3d-rendering" class="gallery-block">
        <h3>_{{$t('3D-Rendering')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-5.png" alt="gallery" />
        </div>
      </router-link>
      <router-link to="/category/production-facilities" class="gallery-block">
        <h3>_{{$t('Production-facilities')}}</h3>
        <div class="overflow">
          <img src="../assets/img/gallery-6.png" alt="gallery" />
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
import Map from '@/components/Map.vue'
export default {
  name: 'Home',
  components: {
    Map
  },
  data: () => ({
    numberAnimation: [0, 0, 0, 0]
  }),
  mounted () {
    let animationStart = false
    let clientHeight = document.documentElement.clientHeight
    let scrollToTopFromElement = document.getElementById('number').offsetTop
    document.addEventListener('scroll', (e) => {
      let currentScrollToTop = window.pageYOffset
      if (scrollToTopFromElement - clientHeight < currentScrollToTop - 40 && !animationStart) {
        this.animateNumber()
        animationStart = true
      }
    })
  },
  methods: {
    animateNumber () {
      let step = 5
      let values = [8, 500, 450, 12]
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
    }
  }
}
</script>

<style lang="scss">
.main-wrap{
  padding-left: 150px;
  transition: all 0.3s;
  background: #f7f7f7;
  &.open{
    padding-left: 420px;
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
        line-height: 79px;
        color: #000000;
      }
      p{
        font-size: 18px;
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
      padding-right: 50px;
      font-weight: 700;
    }
    .text-story{
      padding-top: 100px;
      p{
        max-width: 600px;
        font-size: 16px;
        line-height: 24px;
        text-transform: capitalize;
        color: #424647;
      }
    }
  }
  .gallery{
    margin-top: 155px;
    margin-bottom: 185px;
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
        transform: scale(1);
        transition: transform .3s;
      }
      h3{
        font-size: 12px;
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
}
@media(max-width: 1200px) {
  .main-wrap{
    padding-left: 100px;
    &.open{
      padding-left: 350px;
    }
    .project-counter{
      padding-left: 5%;
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
    padding-left: 80px;
    &.open{
      padding-left: 295px;
    }
    .project-counter{
      padding-left: 0;
      .project-col {
        margin-right: 1%;
        h3{
          font-size: 45px;
        }
        p{
          font-size: 15px;
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
@media(max-width: 768px) {
  
}
@media(max-width: 576px) {
  
}
</style>