<template>
  <div>
    <div class="team-modal-wrap">
      <div class="photo-team">
        <img :src="require(`../assets/img/team/${option.img}`)" :alt="option.firstName + option.lastName">
      </div>
      <div class="info-team">
        <h2>_{{option.profesion}}</h2>
        <h3>{{option.firstName + ' ' + option.lastName}}</h3>
        <p>{{option.description}}</p>
      </div>
      <span class="close" @click="$emit('close')"></span>
    </div>
    <div class="overlay" @click="$emit('close')"></div>
  </div>
</template>

<script>
export default {
  name: 'TeamModal',
  props: {
    option: Object
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
    background: #F8F8F8;
    z-index: 5;
    overflow: hidden;
    .photo-team{
      display: inline-block;
      vertical-align: top;
      width: 43%;
      height: 100%;
      overflow: hidden;
      img{
        width: 100%;
      }
    }
    .info-team{
      display: inline-block;
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
        text-transform: capitalize;
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
      &:hover{
        opacity: 1;
      }
      &:before,
      &:after{
        position: absolute;
        left: 15px;
        content: ' ';
        height: 33px;
        width: 2px;
        background-color: #424647;

      }
      &:before{
        transform: rotate(45deg);
      }
      &:after{
        transform: rotate(-45deg);
      }
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
      max-height: 100vh;
      width: 100%;
      max-width: 470px;
      .photo-team{
        display: block;
        width: 100%;
        height: 350px;
        max-height: 50vh;
        img{
          width: 100%;
        }
      }
      .info-team{
        display: block;
        width: 100%;
        padding: 30px;

      }
    }
  }
  @media(max-width: 576px){

  }
</style>
