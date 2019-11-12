<template>
  <div @click.prevent="$emit('openModal')" class="team-item">
    <img :src="require(`@/assets/img/team/${option.img}`)" :alt="option.firstName + option.lastName">
    <img :src="require(`@/assets/img/team/${option.img_top}`)" :alt="option.firstName + option.lastName" class="img-over">
    <div class="text-wrap">
      <p>{{option.profesion}}</p>
      <p>{{option.firstName + ' ' + option.lastName}}</p>
    </div>
    <div class="line-1"></div>
    <div class="line-2"></div>
    <div class="line-3"></div>
    <div class="line-4"></div>
  </div>
</template>

<script>
export default {
  name: 'TeamItem',
  props: {
    option: Object
  }
}
</script>

<style lang="scss">
.team-item{
  position: relative;
  max-height: 420px;
  padding: 0 4px;
  border-left: 6px solid #f7f7f7;
  border-right: 6px solid #f7f7f7;
  .img-over{
    z-index: 3;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
    transition: all 0.4s;
    transition-delay: 0.1s;
  }
  .text-wrap{
    position: absolute;
    left: 28px;
    bottom: 15px;
    z-index: 2;
    p{
      text-transform: uppercase;
      color: #269DC3;
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 0;
    }
  }
  .line-1{
    position: absolute;
    left: 0;
    top: 0;
    width: 0;
    z-index: 2;
    height: 4px;
    background: #269DC3;
    transition: width .3s;
    transition-delay: .5s;
  }
  .line-2{
    position: absolute;
    right: 0;
    top: 0;
    width: 4px;
    z-index: 2;
    height: 0;
    background: #269DC3;
    transition: height .3s;
    transition-delay: .8s;
  }
  .line-3{
    position: absolute;
    right: 0;
    bottom: 0;
    width: 0;
    z-index: 2;
    height: 4px;
    background: #269DC3;
    transition: width .3s;
    transition-delay: 1.1s;
  }
  .line-4{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 4px;
    z-index: 2;
    height: 0;
    background: #269DC3;
    transition: height .3s;
    transition-delay: 1.4s;
  }
  &:hover{
    .img-over{
      opacity: 0;
    }
    .line-1, .line-3{
      width: 100%;
    }
    .line-2, .line-4{
      height: 100%;
    }
  }
}
</style>
