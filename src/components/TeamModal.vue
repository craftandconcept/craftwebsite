<template>
  <div>
    <div class="team-modal-wrap">
      <div class="photo-team">
        <img :src="option.images.length ? `${backendUrl}${option.images[0].image.path}` : `${backendUrl}${option[`${str}main_image`]}`">
      </div>
      <div class="info-team">
        <h2 v-show="option[`${str}title`]">_{{option[`${str}title`]}}</h2>
        <h3>
          {{option[`${str}name`] + ' '}}
          <template v-show="option[`${str}last_name`]">
            {{option[`${str}last_name`]}}
          </template>
        </h3>
        <p>{{option[`${str}description`]}}</p>
      </div>
      <span class="close" @click="$emit('close')">
        <svg xmlns="http://www.w3.org/2000/svg" id="root" version="1.1" viewBox="0 0 16 14">
          <path fill="none" stroke="currentColor" stroke-linecap="square" d="M 4.5 4.5 L 11.5 11.5 M 4.5 11.5 L 11.5 4.5"/>
      </svg>
      </span>
    </div>
    <div class="overlay" @click="$emit('close')"></div>
  </div>
</template>

<script>
import { apiUrl } from '@/config'
export default {
  name: 'TeamModal',
  data: () => ({
    backendUrl: apiUrl
  }),
  props: {
    option: Object,
    str: String
  },
  created () {
    this.$root.$emit('hideScroll')
  },
  beforeDestroy () {
    this.$root.$emit('showScroll')
  }
}
</script>

<style lang="scss">
  .team-modal-wrap{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 1200px;
    max-height: 90vh;
    background: #fff;
    z-index: 5;
    overflow: hidden;
    display: flex;
    .photo-team{
      display: flex;
      align-items: center;
      width: 43%;
      min-height: 100%;
      overflow: hidden;
      img{
        width: 100%;
      }
    }
    .info-team{
      display: block;
      width: 57%;
      box-sizing: border-box;
      padding: 77px 46px 50px 58px;
      line-height: 1;
      h2{
        font-size: 14px;
        line-height: 100%;
        text-transform: uppercase;
        color: #424647;
        font-weight: 400;
      }
      h3{
        font-size: 64px;
        line-height: 79px;
        text-transform: uppercase;
        font-weight: 700;
        color: #000000;
        margin-bottom: 30px;
      }
      p{
        font-size: 16px;
        line-height: 24px;
        font-weight: 400;
        color: #424647;
      }
    }
    .close {
      position: absolute;
      right: 32px;
      top: 32px;
      width: 24px;
      height: 24px;
      opacity: 0.3;
      cursor: pointer;
      @media(max-width: 767px) {
        opacity: 0.7;
        top: 15px;
        right: 20px;
        background: rgba(256, 256, 256, .95);
        border-radius: 50%;
        width: 40px;
        height: 40px;
      }
      &:hover{
        opacity: 1;
      }
      // &:before,
      // &:after{
      //   position: absolute;
      //   left: 15px;
      //   content: ' ';
      //   height: 33px;
      //   width: 2px;
      //   background-color: #424647;
      //   @media(max-width: 767px) {
      //     background: #000;
      //   }
      // }
      // &:before{
      //   transform: rotate(45deg);
      // }
      // &:after{
      //   transform: rotate(-45deg);
      // }
    }
  }
  .overlay{
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.2);
    z-index: 4;
  }
  @media(max-width: 1200px){
    .team-modal-wrap{
      max-width: 910px;
      .info-team{
        h3{
          font-size: 55px;
        }
      }
    }
  }
  @media(max-width: 992px){
    .team-modal-wrap{
      max-width: 740px;
      .info-team{
        padding: 50px 20px;
        h3{
          font-size: 40px;
          margin-bottom: 7px;
        }
        p{
          font-size: 15px;
        }
      }
      .close{
        &:before,
        &:after{
          height: 27px;
        }
      }
    }
  }
  @media(max-width: 767px){
    .team-modal-wrap{
      overflow: auto;
      min-height: 100vh;
      width: 100%;
      max-width: 470px;
      flex-wrap: wrap;
      .photo-team{
        display: block;
        width: 100%;
        height: 350px;
        max-height: 50vh;
        img{
          width: 100%;
          min-height: 100%;
          object-fit: cover;
        }
      }
      .info-team{
        display: block;
        width: 100%;
        padding: 30px;
        h3 {
          font-size: 32px;
        }
      }
    }
  }
  @media(max-width: 576px){

  }
</style>
