<template>
  <div class="our-story-info">
    <div class="title-our-story">
      <h2>_{{$t('our-story')}}</h2>
    </div>
    <div class="our-story-img">
      <img src="../assets/img/our-story-img.jpg" alt="our-story-img">
    </div>
    <div class="shield-our-story">
      <div class="text-img-shield d-lg-flex d-none">
        <div class="text-shield text-shield-bm">
          <p> The wheel stands for movement, rest and unrest, axis</p>
        </div>
        <div class="text-shield">
          <p> Diagonals stand for equal division</p>
        </div>
      </div>
      <div class="d-flex d-lg-none text-shield-mobile">
        <p> The wheel stands for movement, rest and unrest, axis</p>
        <p> Pyramid or sand clock stands for the mountain; the origin; all business, which has it’s clear phart of growth and final stage</p>
        </div>
      <div class="shield-our">
        <img src="../assets/img/shield-our.png" alt="shield-our-story">
      </div>
      <div class="d-flex d-lg-none text-shield-mobile">
        <p> Diagonals stand for equal division</p>
        <p>Triangle stands for number of three, trinity and also for a structure which has maximum firmness, so it has the power to hold a blow and to break obstacles</p>
      </div>
      <div class="text-img-shield d-lg-flex d-none">
        <div class="text-shield  text-shield-bm">
          <p> Pyramid or sand clock stands for the mountain; the origin; all business, which has it’s clear phart of growth and final stage</p>
        </div>
        <div class="text-shield">
          <p>Triangle stands for number of three, trinity and also for a structure which has maximum firmness, so it has the power to hold a blow and to break obstacles</p>
        </div>
      </div>
    </div>
    <div class="text-our-story">
      <p>{{$t('text-5')}}</p>
      <p>{{$t('text-6')}}</p>
      <p>{{$t('text-7')}}</p>
      <p>{{$t('text-8')}}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'OurStory',
  created () {
    this.$parent.$emit('loadingStart')
    this.$parent.$emit('loadingFinish')
  }
}
</script>

<style lang="scss">
.our-story-info{
  .title-our-story{
    margin-top: 85px;
    h2{
      text-transform: uppercase;
      font-size: 2.2vw;;
      line-height: 79px;
      font-weight: 700;
      color: #000000;
      @media(max-width: 767px) {
        font-size: 24px;
      }
      @media(max-width: 576px) {
        font-size: 18px;
      }
    }
  }
  .our-story-img{
    margin-top: 40px;
    img{
      width: 100%;
      max-height: 500px;
      object-fit: cover;
    }
  }
  .text-our-story{
    margin-top: 70px;
    margin-bottom: 100px;
    p{
      font-size: 16px;
      line-height: 24px;
      font-weight: 400;
      color: #424647
    }
  }
  .shield-our-story{
    display: flex;
    margin-top: 80px;
    .text-img-shield{
      min-width: 18%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      .text-shield{
        height: 40%;
      }
    }
    .shield-our{
      min-width: 50%;
      padding: 0 30px;
      display: flex;
      align-items: center;
      img{
        width: 100%;
      }
    }
  }
}
@media(max-width: 992px){
  .our-story-info{
    .shield-our-story{
      flex-direction: column;
      .text-shield-mobile{
        justify-content: space-between;
        p{
          max-width: 35%;
        }
      }
      .shield-our{
        margin: 20px 0;
        justify-content: center;
        img{
          width: 80%;
        }
      }
    }
  }
}
@media(max-width: 767px){
  .our-story-info{
    .shield-our-story{
      .text-shield-mobile{
        flex-direction: column;
        p{
          max-width: 100%;
        }
      }
      .shield-our{
        padding: 0;
        img{
          width: 100%;
        }
      }
    }
    .text-our-story {
      margin-top: 20px;
    }
  }
}
@media(max-width: 576px){
  .our-story-info{
    .title-our-story {
      margin-top: 25px;
      h2{
        font-size: 40px;
      }
    }
    .text-our-story {
      margin-top: 20px;
      margin-bottom: 55px;
    }
  }
}
</style>
