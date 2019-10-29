<template>
<div class="category-wrap">
  <div class="titel-ah">
    <h2>_{{$t($route.params.name)}}</h2>
  </div>
  <div class="gallery d-flex flex-wrap">
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-1.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-2.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-3.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-4.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-5.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
    <div class="gallery-block project">
      <router-link :to="{name: 'Project', params: {id: 431321}}">
        <div class="overflow">
          <img src="../assets/img/gallery-6.png" alt="gallery" />
        </div>
        <div class="hover-block">
          <h2>Name of the project</h2>
        </div>
      </router-link>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'Category'
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
