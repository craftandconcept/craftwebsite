<template>
  <div>
    <div class="team-modal-wrap">
      <div class="photo-team">
        <img src="../assets/img/team/1.1.png" alt="1.1">
      </div>
      <div class="info-team">
        <h2>_Designer</h2>
        <h3>VIKTOR ZAHARCHENKO</h3>
        <p>He always wanted to be a fireman, but got acquainted with Frank Lloyd Wright’s works (without which it’s hard to imagine modern architecture) – and went astray. He has more than 10 years of experience in designing complex objects: floating restaurants, hotels, social institutions. Even his service in ATO couldn’t split him with architecture – his knowledge was used for the establishment of a protective construction. Brings up a daughter and son, time spent with his family is the most precious for him.</p>
      </div>
      <span class="close"></span>
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
    // max-width: 600px;
    // min-height: 200px;
    background: #F8F8F8;
    z-index: 3;
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
      width: 32px;
      height: 32px;
      opacity: 0.3;
      
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
    z-index: 2;
  }
</style>
