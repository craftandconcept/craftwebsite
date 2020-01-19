<template>
  <div class="our-story-info">
    <div class="title-our-story">
      <h2>_ABOUT US</h2>
    </div>
    <div class="our-story-img">
      <img src="../assets/img/our-story-img.jpg" alt="our-story-img">
    </div>
    <div class="text-our-story">
      <p>
        Find a group of people who challenge and inspire you, spend a lot of time with them, and it will change your life." – Amy Poehler Every craft man is unique by his nature and has his strengths. The beautiful things happen when you gather the best industry professionals to form a concept from a dream. In Craft & Concept, we value traits like attention to details, creativity, efficiency, adaptability and personal touch. Our goal is to bring those qualities to every project, every partner, every client and every family.
        <br />
        <br />
        Trust us and dream on…
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'OurStory'
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
}
@media(max-width: 767px){
  .our-story-info{
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
