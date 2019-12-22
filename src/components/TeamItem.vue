<template>
  <div @click.prevent="$emit('openModal')" class="team-item">
    <img
      :src="option.images.length ? `${backendUrl}${option.images[0].image.path}` : `${backendUrl}${option[`${str}main_image`]}`"
      :alt="option[`${str}name`] + option[`${str}last_name`]"
    >
    <img :src="`${backendUrl}${option[`${str}main_image`]}`" :alt="option[`${str}name`] + option[`${str}last_name`]" class="img-over">
    <div class="text-wrap">
      <p>{{option[`${str}title`]}}</p>
      <p>
        {{option[`${str}name`] + ' '}}
        <template v-show="option[`${str}last_name`]">
          {{option[`${str}last_name`]}}
        </template>
      </p>
    </div>
    <div class="line-1"></div>
    <div class="line-2"></div>
    <div class="line-3"></div>
    <div class="line-4"></div>
  </div>
</template>

<script>
import { apiUrl } from '@/config'
export default {
  name: 'TeamItem',
  data: () => ({
    backendUrl: apiUrl
  }),
  props: {
    option: Object,
    str: String
  }
}
</script>

<style lang="scss">
.team-item{
  position: relative;
  max-height: 420px;
  padding: 0 4px;
  border-left: 6px solid #fff;
  border-right: 6px solid #fff;
  height: 100%;
  overflow: hidden;
  img {
    height: 100%;
    object-fit: cover;
    &:first-child{
      height: unset;
    }
  }
  .img-over{
    z-index: 3;
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
    transition: all 0.4s;
    transition-delay: 0.1s;
    object-fit: cover;
  }
  .text-wrap{
    position: absolute;
    left: 28px;
    bottom: 15px;
    z-index: 2;
    p{
      text-transform: uppercase;
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 0;
      text-shadow: rgba(0, 0, 0, 1);
    }
  }
  .line-1{
    position: absolute;
    left: 0;
    top: 0;
    width: 0;
    z-index: 2;
    height: 4px;
    background: #E2E2E2;
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
    background: #E2E2E2;
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
    background: #E2E2E2;
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
    background: #E2E2E2;
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
