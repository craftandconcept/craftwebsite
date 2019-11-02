<template>
  <div class="our-stoty-info">
    <div class="title-our-story">
      <h2>_{{$t('our-story')}}</h2>
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
  name: 'OurStory'
}
</script>

<style lang="scss">
.our-stoty-info{
  .title-our-story{
    margin-top: 85px;
    h2{
      text-transform: uppercase;
      font-size: 64px;
      line-height: 79px;
      font-weight: 700;
      color: #000000;
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
}
 @media(max-width: 576px){
   .our-stoty-info{
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
